@extends('layout')
@section('title', "ENCG El Jadida")

@section('content')
<div class="container">
  <!-- Sidebar -->
  <div class="sidebar">
    <h3>Navigation</h3>
    <ul>
      <li><a href="{{route('home')}}">Accueil</a></li>
      <li><a href="{{route('cours')}}">Cours</a></li>
      <li><a href="{{route('notes')}}">Notes</a></li>
      <li><a href="{{route('profile')}}">Profil</a></li>
      <li><a href="{{route('messagerie')}}">Messagerie</a></li>
      <li><a href="{{route('DocDemande')}}">Demande de document</a></li>
      <li><a href="{{route('inscription')}}">Inscription</a></li>
    </ul>
  </div>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="cards">
    <table>
      <tr>
        <td>
      <div class="card">
        <h2>Heure actuelle</h2>
        <div id="current-time" style="font-size:2em; margin: 10px 0;"></div>
      </div>
</td>
<td>
      <div class="card">
        <h2>Date actuelle</h2>
        <div id="current-date" style="font-size:1.5em; margin: 10px 0;"></div>
      </div>
</td>
<td>
      <div class="card">
        <h2>Calendrier</h2>
        <div id="calendar"></div>
      </div>
</td>
</tr>
</table>

    </div>

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
  }

  .container {
    display: flex;
    min-height: 100vh;
  }

  .sidebar {
    width: 220px;
    background: #2c3e50;
    color: #fff;
    padding-top: 150px;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 100;
    border-radius: 0 12px 12px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .sidebar h3 {
    text-align: center;
    margin-bottom: 30px;
    color: #ecf0f1;
  }

  .sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
  }

  .sidebar ul li {
    padding: 12px 20px;
    transition: background 0.2s;
    text-align: center;
  }

  .sidebar ul li:hover {
    background: #34495e;
    border-radius: 8px;
  }

  .sidebar a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    display: block;
    font-weight: bold;
  }

  .main-content {
    margin-left: 220px;
    padding: 60px 40px 120px;
    background: rgba(255, 255, 255, 0.45);
    border-radius: 14px;
    flex: 1;
  }

  .cards {
    display: flex;
    gap: 24px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 40px;
  }

  .card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(44, 62, 80, 0.10);
    padding: 32px;
    min-width: 260px;
    max-width: 340px;
    color: #2c3e50;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 1.08em;
    margin:20px;
  }

  .dashboard-row {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .todo-list, .activity {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
    padding: 60px;
    min-width: 320px;
    max-width: 500px;
    color: #2c3e50;
    font-size: 1.1em;
  }

  footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background: #003366;
    color: white;
    text-align: center;
    padding: 18px 0;
    z-index: 100;
    border-radius: 12px 12px 0 0;
  }

  button {
    background: linear-gradient(to right, #2c3e50, #3498db);
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
  }

  #todo-form {
    display: flex;
    gap: 10px;
    margin-bottom: 16px;
  }

  #todo-input {
    flex: 1;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
  }

  #todo-items li {
    background: #f4f6fa;
    margin-bottom: 8px;
    padding: 8px 12px;
    border-radius: 6px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  #todo-items li button {
    background: #e74c3c;
    border: none;
    color: #fff;
    padding: 4px 8px;
    border-radius: 4px;
    cursor: pointer;
  }
</style>

<script>
  // Heure actuelle
  function updateTime() {
    const now = new Date();
    document.getElementById('current-time').textContent = now.toLocaleTimeString();
  }
  setInterval(updateTime, 1000);
  updateTime();

  // Date actuelle
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

  // To-Do List
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('todo-form');
    const input = document.getElementById('todo-input');
    const list = document.getElementById('todo-items');
    let todos = JSON.parse(localStorage.getItem('todos') || '[]');
    renderTodos();

    form.addEventListener('submit', function (e) {
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
        btn.onclick = function () {
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
@endsection
