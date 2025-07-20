@extends('layout')
@section('title', "ENCG El Jadida")
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{asset(icon.png)}}">
  <title>ENCG El Jadida</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f8fb;
      background-image: url('{{ asset('Images/ENCG Image.jpg') }}');
      background-position: center;
      padding: 40px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      margin-top:11px;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #003366;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    select, textarea, input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 20px;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
    }

    button {
      background-color: #0066cc;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }

    button:hover {
      background-color: #004d99;
    }

    .back-link {
      margin-top: 20px;
      display: block;
      text-align: center;
    }

    .back-link a {
      text-decoration: none;
      color: #0066cc;
    }

    .back-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Demande de document</h2>

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

    <form action = "{{route('DocDemande.post')}}" method="POST">
    @csrf
      <label for="type_document">Type de document :</label>
      <select name="type_document" id="type_document" required>
        <option value="">-- Choisissez un document --</option>
        <option value="Certificat de scolarité">Certificat de scolarité</option>
        <option value="Relevé de notes">Relevé de notes</option>
        <option value="Attestation de stage">Attestation de stage</option>
        <option value="Autre">Autre</option>
      </select>

      <label for="message">Message / Précisions :</label>
      <textarea id="message" name="message" rows="4" placeholder="Écrivez votre demande ici..." required></textarea>

      <button type="submit">Envoyer la demande</button>
    </form>

    <div class="back-link">
      <a href="{{route('home')}}">⬅️ Retour a la page d'acceuil</a>
    </div>
  </div>

</body>
</html>

@endsection
