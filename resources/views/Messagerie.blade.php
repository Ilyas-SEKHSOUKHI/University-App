@extends('layout')
@section('title', "ENCG El Jadida")
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="Image déposée.png">
  <title>ENCG El Jadida</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      background-image: url('{{ asset('Images/ENCG Image.jpg') }}');
      background-position: center;
      padding: 30px;
    }

    .chat-box {
      width: 600px;
      margin: auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      padding: 20px;
    }

    .message {
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 8px;
      background: #e0ecff;
    }

    .message.me {
      background: #d4f8cc;
      text-align: right;
    }

    .chat-input {
      display: flex;
      margin-top: 20px;
    }

    .chat-input input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px 0 0 6px;
    }

    .chat-input button {
      padding: 10px 20px;
      background: #0066cc;
      color: white;
      border: none;
      border-radius: 0 6px 6px 0;
      cursor: pointer;
    }

    h2 {
      text-align: center;
      color: #ffffff;
    }
  </style>
</head>
<body>

  <h2>Messagerie</h2>

  <div class="chat-box">
    <div class="message">Prof. Marwane : Bonjour Ilyas, as-tu terminé le devoir ?</div>
    <div class="message me">Moi : Bonjour Professeur, oui je l'ai envoyé hier.</div>
    <div class="message">Prof. Marwane : Parfait, merci.</div>

    <div class="chat-input">
      <input type="text" placeholder="Écrire un message...">
      <button>Envoyer</button>
    </div>
  </div>

</body>
</html>

@endsection
