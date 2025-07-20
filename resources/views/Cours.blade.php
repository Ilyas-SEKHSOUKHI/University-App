@extends('layout')
@section('title', "ENCG El Jadida")
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Image déposée.png">
  <title>ENCG El Jadida</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f5f5f5;
      color: #333;
    }

    header {
      background-color: #004080;
      color: white;
      padding: 20px;
      text-align: center;
    }

    nav {
      background-color: #0066cc;
      display: flex;
      justify-content: center;
      padding: 10px 0;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 20px;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .hero {
      background-color: #e0ecff;
      padding: 40px;
      text-align: center;
    }

    .hero h1 {
      margin-bottom: 10px;
    }

    .courses {
      padding: 40px;
      max-width: 1000px;
      margin: auto;
    }

    .course-card {
      background-color: white;
      border: 1px solid #ccc;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    footer {
      background-color: #004080;
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <h1>ENCG EL JADIDA Plateforme</h1>
    <p>Bienvenue à votre espace d’apprentissage</p>
  </header>

 

  <div class="hero">
    <h1>Apprenez, progressez, réussissez</h1>
    <p>Accédez à tous vos cours et ressources en ligne.</p>
  </div>

  <section class="courses">
    <div class="course-card">
      <h2>Mathématiques</h2>
      <p>Algèbre, Analyse, Probabilités... Accédez à tous les supports.</p>
    </div>

    <div class="course-card">
      <h2>Informatique</h2>
      <p>Programmation, Base de données, Réseaux... Cours et exercices disponibles.</p>
    </div>

    <div class="course-card">
      <h2>Physique</h2>
      <p>Mécanique, Électromagnétisme, Optique... Comprenez les lois fondamentales.</p>
    </div>
  </section>

  <footer>
    &copy; 2025 ENCG El Jadida - Tous droits réservés.
  </footer>

</body>
</html>

@endsection