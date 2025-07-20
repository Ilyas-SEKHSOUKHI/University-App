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
      background: #eef2f7;
      background-image: url('{{ asset('Images/ENCG Image.jpg') }}');
      background-position: center;x
      padding: 40px;
    }
     h3{ 
      font-size:18px;
     }
    .profile-card {
      background: white;
      width: 400px;
      margin: 11px;
      margin-left: 450px;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      text-align: center;
      margin-top: 30px;
    }

    .profile-card img {
      width: 100px;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .profile-card h2 {
      color: #003366;
    }

    .profile-card p {
      margin: 10px 0;
    }
  </style>
</head>
<body>

  <div class="profile-card">
    <img src="Images/avatar.png" alt="Photo de profil">
     
       <h2>Welcome  {{auth()->user()->name}} </h2>
       <h3>Email : {{auth()->user()->email}} </h3>

        
  </div>

</body>
</html>

@endsection
