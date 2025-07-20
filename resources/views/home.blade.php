@extends('layout')
@section('title', "ENCG El Jadida")
@section('content')
    
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="{{ asset('icon.png') }}">
  <title>ENCG El Jadida</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      background-color: #f0f2f5;
      background-image: url('{{ asset('Images/ENCG Image.jpg') }}');
      background-position: center; 
      /*background-repeat: repeat-x;
      background-attachment: fixed;*/
    }

    header {
      background-color: #003366;
      color: white;
      padding: 20px;
      text-align: center;
    }

    /*.container {
      display: grid;
      grid-template-columns: 1fr 3fr;
      gap: 20px;
      padding: 20px;
    }*/

    .sidebar {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      height: fit-content;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .sidebar h3 {
      margin-bottom: 15px;
      color: #003366;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      margin: 10px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #333;
    }

    .sidebar ul li a:hover {
      color: #0066cc;
    }

    /*.main-content {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }*/

    .cards {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin:50px;
      margin-left:100px;
    }

    .card {
      background-color: white;
      flex: 1;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      text-align: center;
      margin:20px;
    }

    .card h2 {
      font-size: 2em;
      color: #003366;
    }

    .card p {
      margin-top: 10px;
      font-weight: bold;
    }

    .activity {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .activity h3 {
      margin-bottom: 15px;
      color: #003366;
    }

    .activity ul {
      list-style: none;
    }

    .activity ul li {
      margin-bottom: 10px;
      border-bottom: 1px solid #eee;
      padding-bottom: 8px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #003366;
      color: white;
      margin-top: 30px;
    }
    button{
    background: linear-gradient(to right, #2c3e50, #3498db);
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 0px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}
button.hidden{
    background-color: transparent;
    border-color: #fff;
}
 a {
      color: #ffffffff;
      font-weight: bold;
      text-decoration: none;
    }
    img{
      width: 15%;
      margin-left:105px;
    }
  </style>
</head>
<body>

  <!--<header>
    <h1>Tableau de bord - ENCG EL JADIDA Plateforme </h1>
  </header>-->

  <div class="container">
    @csrf
    <!-- Barre latérale -->
  <!--  <div class="sidebar">
      <h3>Navigation</h3>
      <ul>
        <li><a href="{{route('home')}}">🏠 Accueil</a></li>
        <li><a href="{{route('cours')}}">📚 Cours</a></li>
        <li><a href="{{route('notes')}}">📝 Notes</a></li>
        <li><a href="{{route('profile')}}">👤 Profil</a></li>
        <li><a href="{{route('messagerie')}}">📨 Messagerie</a></li>
        <li><a href="{{route('DocDemande')}}">📄 Demande de document</a></li>
        <li><a href="{{route('inscription')}}">🆕 Inscription</a></li>
      </ul>
    </div>-->

    <!-- Contenu principal -->
    <div class="main-content">
      <!-- Cartes statistiques -->
      <div class="cards">

      <table>

      <tr>
        <td>
        <div class="card">
          <img src="Images/Accueil.png" alt="Accueil">
          <h2>Accueil</h2>
          <button><a href="{{route('home')}}">Entrer</a></button>
        </div>
  </td>
<td>
        <div class="card">
          <img src="Images/classe.png" alt="Cours">
          <h2>Cours</h2>
          <button><a href="{{route('cours')}}">Entrer</a></button>
        </div>
  </td>
<td>
        <div class="card">
          <img src="Images/avatar.png" alt="Profil">
          <h2>Profil</h2>
          <button><a href="{{route('profile')}}">Entrer</a></button>
        </div>
  </td>
  </tr>
  <tr>
    <td>
        <div class="card">
          <img src="Images/Messagerie.png" alt="Messagerie">
          <h2>Messagerie</h2>
          <button><a href="{{route('messagerie')}}">Entrer</a></button>
        </div>
  </td>
  <td>
        <div class="card">
          <img src="Images/DemandeDoc.png" alt="Demande de document">
          <h2>Document</h2>
          <button><a href="{{route('DocDemande')}}">Entrer</a></button>
        </div>
  </td>
  <td>
        <div class="card">
          <img src="Images/inscription.png" alt="Inscription">
          <h2>Inscription</h2>
          <button><a href="{{route('inscription')}}">Entrer</a></button>
        </div>
  </td>
  </tr>
  
  </table>

      </div>

      <!-- Activité récente -->
   <!--   <div class="activity">
        <h3>📌 Activité récente</h3>
        <ul>
          <li>✔️ Vous avez terminé le module "Introduction à la Programmation".</li>
          <li>📬 Nouveau message de Prof. Ouidir Marwane.</li>
          <li>📅 Évaluation prévue en Physique le 10 juillet.</li>
          <li>🔔 Mise à jour du cours de Mathématiques.</li>
        </ul>
      </div>-->
    </div>
  </div>

  <footer>
    &copy; 2025 ENCG El Jadida. Tous droits réservés.
  </footer>

</body>
</html>

@endsection