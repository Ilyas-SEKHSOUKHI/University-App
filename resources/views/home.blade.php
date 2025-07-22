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
      padding-top: 0; /* ou retire cette ligne si tu utilises margin-top sur la navbar */
    }

    header {
      background-color: #003366;
      color: white;
      /*padding: 20px;*/
      text-align: center;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 3fr;
      gap: 20px;
      padding: 20px;
    }

    .sidebar {
      position: fixed;
      top: 150px;
      left: 0;
      width: 220px;
      height: calc(100vh - 70px);
      background: #2c3e50;
      color: #fff;
      padding: 30px 0 0 0;
      z-index: 1000;
      border-radius: 0 12px 12px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sidebar h3 {
      text-align: center;
      margin-bottom: 30px;
      color: #ecf0f1;
      letter-spacing: 1px;
      width: 100%;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      transition: background 0.2s;
    }

    .sidebar ul li img {
      width: 28px;
      height: 28px;
      margin-right: 15px;
      object-fit: contain;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      flex: 1;
    }

    .sidebar ul li:hover {
      background: #34495e;
      border-radius: 8px;
    }

    .main-content {
      margin-left: 150px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 60px 0 120px 0;
      background: rgba(255,255,255,0.95);
      border-radius: 14px;
    }

    .cards {
      display: flex;
      gap: 24px;
      justify-content: center;
      align-items: stretch; /* ou center si tu veux centrer verticalement le contenu */
      flex-wrap: nowrap;    /* pour forcer sur une seule ligne */
      margin-bottom: 40px;
    }

    .card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 3px 12px rgba(44,62,80,0.10);
      padding: 32px;
      min-width: 260px;
      max-width: 340px;
      flex: 1 1 260px;
      color: #2c3e50;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 1.08em;
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
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100vw;
      background: #003366;
      color: white;
      text-align: center;
      padding: 18px 0;
      z-index: 100;
      border-radius: 12px 12px 0 0;
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
    .main-content{
      background-color: rgba(255, 255, 255, 0.57);;
      border-radius: 8px;
      margin-top:150px;
      padding:50px;
      
    }
    .dashboard-row {
      display: flex;
      gap: 30px;
      margin-top: 40px;
    }

    .todo-list, .activity {
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      padding: 60px;
      min-width: 420px;
      max-width: 600px;
      flex: 1 1 420px;
      color: #2c3e50;
      font-size: 1.25em;
    }

    .todo-list h3, .activity h3 {
      margin-bottom: 18px;
    }

    #todo-form {
      display: flex;
      gap: 8px;
      margin-bottom: 16px;
      width: 100%;
      align-items: stretch; /* Ajoute cette ligne */
    }

    #todo-input {
      flex: 1 1 0;
      padding: 10px;
      margin: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1em;
      height: 44px; /* hauteur standard */
      box-sizing: border-box;
    }

    #todo-items {
      list-style: none;
      padding: 0;
    }

    #todo-items li {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #f4f6fa;
      margin-bottom: 8px;
      padding: 8px 12px;
      border-radius: 6px;
    }

    #todo-items li button {
      background: #e74c3c;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 4px 8px;
      cursor: pointer;
    }
    .navbar {
      position: fixed;
      top: 100px;
      left: 0;
      width: 100%;
      height: 60px;
      background: #34495e;
      color: #fff;
      z-index: 1100;
      display: flex;
      align-items: center;
      padding: 0 30px;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      margin-top: 0;
    }
    .card, .todo-list, .activity {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 3px 12px rgba(44,62,80,0.10);
      padding: 32px;
      min-width: 300px;
      max-width: 400px;
      flex: 1 1 0;
      color: #2c3e50;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 1.08em;
    }

    .card h2, .todo-list h3, .activity h3 {
      font-size: 1.4em;
      margin-bottom: 18px;
    }

    #current-time {
      font-size: 1.6em !important;
    }
    #current-date {
      font-size: 1.2em !important;
    }
    #calendar {
      font-size: 1em;
    }
    #todo-input {
      font-size: 1em;
    }
    #todo-items li {
      font-size: 1em;
    }
    .todo-list form,
#todo-form {
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
}

#todo-input {
  width: 0;
  min-width: 0;
  flex: 1 1 0;
  max-width: 100%;
  box-sizing: border-box;
}

#todo-form button {
  height: 44px; /* même hauteur que l’input */
  padding: 0 24px;
  border-radius: 6px;
  border: none;
  background: linear-gradient(to right, #2c3e50, #3498db);
  color: #fff;
  font-size: 1em;
  font-weight: 600;
  letter-spacing: 0.5px;
  cursor: pointer;
  flex-shrink: 0;
  /* Pour que le bouton ne soit pas trop large, mais bien aligné */
}

#todo-items {
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
}

.todo-list {
  align-items: stretch; /* Pour que le contenu prenne toute la largeur de la card */
}
  </style>
</head>
<body>

  <!--<header>
    <h1>Tableau de bord - ENCG EL JADIDA Plateforme </h1>
  </header>

  <div class="navbar">
    <h1>Tableau de bord - ENCG EL JADIDA Plateforme </h1>
  </div>-->

  <div class="container">
    @csrf
    <!-- Barre latérale -->
   <div class="sidebar">
      <h3>Navigation</h3>
      <ul>
        <li>
         <!-- <img src="Images/Accueil.png" alt="Accueil">-->
          <a href="{{route('home')}}">Accueil</a>
        </li>
        <li>
        <!--<img src="Images/classe.png" alt="Cours">-->
          <a href="{{route('cours')}}">Cours</a>
        </li>
        <li>
          <a href="{{route('notes')}}">Notes</a>
        </li>
        <li>
          <!--<img src="Images/avatar.png" alt="Profil">-->
          <a href="{{route('profile')}}">Profil</a>
        </li>
        <li>
          <!--<img src="Images/Messagerie.png" alt="Messagerie">-->
          <a href="{{route('messagerie')}}">Messagerie</a>
        </li>
        <li>
          <!--<img src="Images/DemandeDoc.png" alt="Demande de document">-->
          <a href="{{route('DocDemande')}}">Demande de document</a>
        </li>
        <li>
          <!--<img src="Images/inscription.png" alt="Inscription">-->
          <a href="{{route('inscription')}}">Inscription</a>
        </li>
      </ul>
   </div>

    <!-- Contenu principal -->
    <div class="main-content">
      <!-- Cartes statistiques -->
      <div class="cards">
  <!-- Card 1 : Heure actuelle -->
  <div class="card">
    <h2>Heure actuelle</h2>
    <div id="current-time" style="font-size:2em; margin: 10px 0;"></div>
  </div>

  <!-- Card 2 : Date actuelle -->
  <div class="card">
    <h2>Date actuelle</h2>
    <div id="current-date" style="font-size:1.5em; margin: 10px 0;"></div>
  </div>

  <!-- Card 3 : Calendrier -->
  <div class="card">
    <h2>Calendrier</h2>
    <div id="calendar"></div>
  </div>
</div>

      <!-- Activité récente -->
   <div class="dashboard-row">
  <div class="todo-list">
    <h3>📝 To-Do List</h3>
    <form id="todo-form">
      <input type="text" id="todo-input" placeholder="Ajouter une tâche..." required>
      <button type="submit">Ajouter</button>
    </form>
    <ul id="todo-items"></ul>
  </div>
  <div class="activity">
    <h3>🏫 University News</h3>
    <ul>
      <li>📰 Nouvelle annonce universitaire.</li>
      <li>🔔 Mise à jour du cours de Mathématiques.</li>
    </ul>
  </div>
</div>
    </div>
  </div>

  <footer>
    &copy; 2025 ENCG El Jadida. Tous droits réservés.
  </footer>

<script>
  // Affichage de l'heure actuelle
  function updateTime() {
    const now = new Date();
    document.getElementById('current-time').textContent = now.toLocaleTimeString();
  }
  setInterval(updateTime, 1000);
  updateTime();

  // Affichage de la date actuelle
  function updateDate() {
    const now = new Date();
    document.getElementById('current-date').textContent = now.toLocaleDateString('fr-FR', {
      weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
    });
  }
  updateDate();

  // Calendrier simple
  function generateCalendar() {
    const now = new Date();
    const month = now.getMonth();
    const year = now.getFullYear();
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const calendar = document.getElementById('calendar');
    let days = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
    let html = '<table style="width:100%;text-align:center;"><tr>';
    days.forEach(d => html += `<th>${d}</th>`);
    html += '</tr><tr>';
    let dayOfWeek = (firstDay === 0) ? 6 : firstDay - 1;
    for (let i = 0; i < dayOfWeek; i++) html += '<td></td>';
    for (let d = 1; d <= daysInMonth; d++) {
      if ((dayOfWeek % 7) === 0 && d !== 1) html += '</tr><tr>';
      html += `<td${d === now.getDate() ? ' style="background:#3498db;color:#fff;border-radius:50%;"' : ''}>${d}</td>`;
      dayOfWeek++;
    }
    html += '</tr></table>';
    calendar.innerHTML = html;
  }
  generateCalendar();

  // To-Do List JS
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('todo-form');
    const input = document.getElementById('todo-input');
    const list = document.getElementById('todo-items');

    // Charger les tâches depuis le localStorage
    let todos = JSON.parse(localStorage.getItem('todos') || '[]');
    renderTodos();

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      if (input.value.trim() !== '') {
        todos.push(input.value.trim());
        input.value = '';
        saveAndRender();
      }
    });

    function renderTodos() {
      list.innerHTML = '';
      todos.forEach((todo, idx) => {
        const li = document.createElement('li');
        li.textContent = todo;
        const btn = document.createElement('button');
        btn.textContent = 'Supprimer';
        btn.onclick = function() {
          todos.splice(idx, 1);
          saveAndRender();
        };
        li.appendChild(btn);
        list.appendChild(li);
      });
    }

    function saveAndRender() {
      localStorage.setItem('todos', JSON.stringify(todos));
      renderTodos();
    }
  });
</script>

</body>
</html>

@endsection