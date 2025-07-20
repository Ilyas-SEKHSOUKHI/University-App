@extends('layout')
@section('title', "ENCG El Jadida")
@section('content')


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscription CNAEM – ENCG UCD</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      background-image: url('{{ asset('Images/ENCG Image.jpg') }}');
      background-position: center; 
      background-repeat: repeat-x;
      background-attachment: fixed;
      margin: 0;
      padding: 20px;
    }

   

    .form-container {
      max-width: 800px;
      margin: auto;
      background-color: #ffffff79;
      margin-top:150px;
      border: 1px solid #ccc;
      padding: 20px 30px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
    }

    .form-header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .form-header img {
      height: 60px;
      margin-right: 20px;
    }

    .form-header h1 {
      font-size: 24px;
      margin: 0;
    }

    fieldset {
      margin-bottom: 20px;
      border: 1px solid #aaa;
      padding: 15px 20px;
    }

    legend {
      padding: 0 8px;
      font-weight: bold;
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 4px;
    }

    input, select, textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
      height: 80px;
    }

    .full-width {
      grid-column: 1 / -1;
    }

    #btn {
      background: #00529B;
      color: white;
      border: none;
      padding: 12px 20px;
      margin-right:5px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    #btn:hover {
      background: #003f77;
    }
    a{
      font-weight: bold;
      text-decoration: none;
    }

  
  </style>
</head>
<body>

  <div class="form-container">
    <div class="form-header">
      <img src="{{asset('Images/icon2.png')}}" alt="ENCG Logo">
      <h1>Formulaire d'inscription CNAEM</h1>
    </div>

    <div class="mt-5">
    @if($errors->any())
      <div class="col-12">
          @foreach($errors->all() as $error) 
             <div class="alert alert-danger">{{$error}}</div>
          @endforeach   
      </div>
    @endif 
        
    @if(session()->has('error'))
       <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
       <div class="alert alert-success">{{session('success')}}</div>
    @endif

  </div>

    <form action="{{route('inscription.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <fieldset>
        <legend>Informations personnelles</legend>
        <div class="grid">
          <div>
            <label for="nom">Nom complet</label>
            <input type="text" id="nom" value="{{auth()->user()->name}}"  disabled>
          </div>
          <div>
            <label for="cne">CNE</label>
            <input type="text" id="cne" name="cne" required>
          </div>
          <div>
            <label for="cin">CIN</label>
            <input type="text" id="cin" name="cin" required>
          </div>
          <div>
            <label for="date_naiss">Date de naissance</label>
            <input type="date" id="date_naiss" name="date_naiss" required>
          </div>
          <div class="full-width">
            <label for="adresse">Adresse</label>
            <textarea id="adresse" name="adresse" required></textarea>
          </div>
          <div class="full-width">
            <label for="photo">Ajouter une image (photo d'identité ou document PDF/scan)</label>
            <input type="file" id="photo" name="photo" accept="image/*,application/pdf" required>
          </div>
        </div>

        <br>
        <label>Genre:</label>
        <table>
            <tr>
                <th><label class="form-check-label required" for="genre_masculin">Masculin</label></th>
                <td><input type="radio" id="genre_masculin" name="genre" value="Masculin" required></td>
            </tr>
            <tr>
                <th><label class="form-check-label required" for="genre_feminin">Féminin</label></th>
                <td> <input type="radio" id="genre_feminin" name="genre" value="Féminin" required></td>
            </tr>
        </table>    

    </fieldset>

    <fieldset>
        <legend>Informations Parentales</legend>
        <div class="grid">
          <div><label for="pere_nom">Nom du Père</label><input type="text" id="pere_nom" name="f_f_name" required></div>
          <div><label for="mere_nom">Nom de la Mère</label><input type="text" id="mere_nom" name="m_f_name" required></div>
          <div><label for="pere_profession">Profession du Père</label>
            <select id="pere_profession" name="f_profession" required>
              <option value="">Sélectionner ...</option>
              <option value="Agriculteur exploitant">Agriculteur exploitant</option>
              <option value="décidé">décidé</option>
              <option value="retraité">retraité</option>
              <option value="Pêcheur">Pêcheur</option>
              <option value="Adoule">Adoule</option>
              <option value="Immigré">Immigré</option>
              <option value="Artisan">Artisan</option>
              <option value="Commerçant et assimilé">Commerçant et assimilé</option>
              <option value="Chef entreprise 10 salariés ou plus">Chef entreprise 10 salariés ou plus</option>
              <option value="Profession libérale">Profession libérale</option>
              <option value="Cadre de la fonction publique">Cadre de la fonction publique</option>
              <option value="Professeur, profession scientifique">Professeur, profession scientifique</option>
              <option value="Sans emploi">Sans emploi</option>
            </select>
          </div>
          <div><label for="mere_profession">Profession de la Mère</label>
            <select id="mere_profession" name="m_profession" required>
              <option value="">Sélectionner ...</option>
              <option value="Agriculteur exploitant">Agriculteur exploitant</option>
              <option value="décidé">décidé</option>
              <option value="retraité">retraité</option>
              <option value="Pêcheur">Pêcheur</option>
              <option value="Adoule">Adoule</option>
              <option value="Immigré">Immigré</option>
              <option value="Artisan">Artisan</option>
              <option value="Commerçant et assimilé">Commerçant et assimilé</option>
              <option value="Chef entreprise 10 salariés ou plus">Chef entreprise 10 salariés ou plus</option>
              <option value="Profession libérale">Profession libérale</option>
              <option value="Cadre de la fonction publique">Cadre de la fonction publique</option>
              <option value="Professeur, profession scientifique">Professeur, profession scientifique</option>
              <option value="Sans emploi">Sans emploi</option>
            </select>
          </div>
          <div><label for="pere_tel">Tél. Père</label><input type="tel" id="pere_tel" name="f_tel" placeholder="+2126XXXXXXXX" required></div>
          <div><label for="mere_tel">Tél. Mère</label><input type="tel" id="mere_tel" name="m_tel" placeholder="+2126XXXXXXXX" required></div>
        </div>
    </fieldset>


      <fieldset>
        <legend>Contact & Académique</legend>
        <div class="grid">
          <div>
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" required>
          </div>
          <div>
            <label for="email">Email</label>
            <input type="email" id="email" value="{{auth()->user()->email}}" disabled>
          </div>
          <div>
            <label for="bac_serie">Série du Bac</label>
            <input type="text" id="bac_serie" name="bac_serie">
          </div>
          <div>
            <label for="bac_mention">Mention du Bac</label>
            
            <select id="inscription_bac_mention" name="bac_mention" required class="select2 form-control">
            <option value="" selected="selected" id="bac_mention" >Séléctionner ...</option>
            <option value="Passable">Passable</option>
            <option value="Assez bien">Assez bien</option>
            <option value="Bien">Bien</option>
            <option value="Très bien">Très bien</option>
            <option value="Excellent">Excellent</option>
            </select>
          </div>
        </div>
      </fieldset>
    
     <fieldset>
        <legend>Inscription actuelle</legend>
        <div class="grid">
          <div>
            <label for="niveau_actuel">Niveau (ex : L1, L2…)</label>
            <input type="text" id="niveau_actuel" name="niveau_actuel">
          </div>
          <div class="full-width">
            <label for="modules_valides">Modules validés (S1 à S6)</label>
            <input type="range" id="modules_valides" name="modules_valides" min="1" max="6">
          </div>

          <div>
            <label for="bac_mention">inscription_bac_academie</label>
            <select id="inscription_bac_academie" name="bac_town" required="required" class="select2 form-control">
            <option value="" selected="selected">Selectionner...</option>
            <option value="ETRANGERE">ETRANGERE</option>
            <option value="OUED EDDHAB-LAGOUIRA">OUED EDDHAB-LAGOUIRA</option>
            <option value="LAAYOUNE-BOUJDOUR-SKIA LHAMRAA">LAAYOUNE-BOUJDOUR-SKIA LHAMRAA</option>
            <option value="GUELMIM-ESSMARA">GUELMIM-ESSMARA</option>
            <option value="AGADIR SOUSS-MASSA-DRAA">AGADIR SOUSS-MASSA-DRAA</option>
            <option value="GHARB-CHRARDA-BENI HSSEN">GHARB-CHRARDA-BENI HSSEN</option>
            <option value="CHAOUIA-OURDIGHA">CHAOUIA-OURDIGHA</option>
            <option value="MARRAKECH-TANSIFT-ALHAOUZ">MARRAKECH-TANSIFT-ALHAOUZ</option>
            <option value="L'ORIENTALE-OUJDA">L'ORIENTALE-OUJDA</option>
            <option value="GRAND CASABLANCA">GRAND CASABLANCA</option>
            <option value="RABAT- SALE-ZEMMOUR-ZAIR">RABAT- SALE-ZEMMOUR-ZAIR</option>
            <option value="DOUKALA-ABDA">DOUKALA-ABDA</option>
            <option value="TADLA-AZILAL">TADLA-AZILAL</option>
            <option value="MEKNES-TAFILALT">MEKNES-TAFILALT</option>
            <option value="FES-BOULMANE">FES-BOULMANE</option>
            <option value="TAZA-AL HOUCEIMA-TAOUNATE">TAZA-AL HOUCEIMA-TAOUNATE</option>
            <option value="TANGER-TETOUAN">TANGER-TETOUAN</option>
            <option value="MILITAIRE">MILITAIRE</option>
            <option value="MAROC">MAROC</option>
            <option value="AUTRE">AUTRE</option>
            <option value="CASA-BEN M'SIK">CASA-BEN M'SIK</option>
            </select>
          </div>




        </div>
      </fieldset>

      <fieldset>
        <legend>Motif / Observations</legend>
        <textarea id="motif" name="motif" placeholder="Raison du choix du CNAEM…"></textarea>
      </fieldset>
      
    </form>
     
    <table>
    <tr>
      <td>
        <button type="submit" id="btn">Soumettre l'inscription</button>
      </td>
      <td>
        <button style = " border :0; background: #00407700;" ><a id="btn" href="{{route('fiche_inscription')}}">fiche d'inscription</a></button>
      </td>
    </tr>
  </table>

  </div>

  

</body>
</html>

@endsection
