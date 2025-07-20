<?php

namespace App\Http\Controllers;

use App\Models\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Images;
use App\Models\DemandeDoc;
use App\Models\INSCRIPTION;
use Barryvdh\DomPDF\Facade\Pdf;


class AuthManager extends Controller {

    function login () {
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration () {
         if(Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request ->only ('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))->with("success", "login successfull");
        }
        return redirect(route('login'))->with("error", "login details are not valid");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "registration failed try again");
        }
        return redirect(route('login'))->with("success", "registration successfull , login to access to the app");

    }

    function logout () {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    function cours () {
        return view('cours');
    }

    function notes () {
        return view('notes');
    }

    function profile () {
        return view('profile');
    }

    function messagerie () {
        return view('messagerie');
    }

    function DocDemande () {
        return view('DocDemande');
    }

    function DocDemandePost(Request $request){
        $request->validate([
            'type_document' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

    try {
        // Création de la demande
        DemandeDoc::create([
            'user_id' => Auth::id(), // ID de l'utilisateur connecté
            'type_document' => $request->input('type_document'),
            'message' => $request->input('message'),
        ]);

    return back()->with('success', 'Votre demande a été envoyée avec succès.');
    }
    catch (\Exception $e) {
        return back()->with('error', 'Une erreur est survenue lors de l’envoi de votre demande.');
    }

    }
    
    function home () {
        return view('home');
    }

    function inscription () {
        return view('inscription');
    }

    function inscriptionPost (Request $request) {
        $request->validate([
            'cne' => 'required',
            'cin' => 'required',
            'date_naiss' => 'required|date',
            'adresse' => 'required|string|max:255',
            'photo' => 'required|image|max:2048', 
            'genre' => 'required|string',
            'f_f_name' => 'required|string',
            'm_f_name' => 'required|string',
            'f_profession' => 'required|string',
            'm_profession' => 'required|string',
            'f_tel' => 'required|string',
            'm_tel' => 'required|string',
            'telephone' => 'required|string',
            'bac_serie' => 'required|string',
            'bac_mention' => 'required|string',
            'niveau_actuel' => 'required|string',
            'modules_valides' => 'required|string',
            'bac_town' => 'required|string',
            'motif' => 'required|string',
        ]);

    try {
          $filename = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/photos'), $filename);
        }

        // Création de la demande
        INSCRIPTION::create([
            'user_id' => Auth::id(),
            'cne' => $request->cne,
            'cin' => $request->cin,
            'date_naiss' => $request->date_naiss,
            'adresse' => $request->adresse,
            'photo' => $filename, // <- ici c'est stocké
            'genre' => $request->genre,
            'f_f_name' => $request->f_f_name,
            'm_f_name' => $request->m_f_name,
            'f_profession' => $request->f_profession,
            'm_profession' => $request->m_profession,
            'f_tel' => $request->f_tel,
            'm_tel' => $request->m_tel,
            'telephone' => $request->telephone,
            'bac_serie' => $request->bac_serie,
            'bac_mention' => $request->bac_mention,
            'niveau_actuel' => $request->niveau_actuel,
            'modules_valides' => $request->modules_valides,
            'bac_town' => $request->bac_town,
            'motif' => $request->motif,
        ]);

    return back()->with('success', 'Votre demande a été envoyée avec succès.');
    }
    catch (\Exception $e) {
        return back()->with('error', 'Une erreur est survenue lors de l envoi de votre demande.'. $e->getMessage());
    }

    }

    function fiche_inscription() {
    $userId = auth()->id();

    $inscription = \App\Models\Inscription::where('user_id', $userId)->with('user')->latest()->first();

    if (!$inscription) {
        return redirect()->back()->with('error', 'Aucune inscription trouvée.');
    }

    return view('fiche_inscription', compact('inscription'));
   }

    public function fiche_inscription_pdf($id)
   {
    $inscription = \App\Models\Inscription::with('user')->findOrFail($id);

    $pdf = Pdf::loadView('fiche_inscription_pdf', compact('inscription'));
    return $pdf->download('fiche_inscription.pdf');
   }
   
}