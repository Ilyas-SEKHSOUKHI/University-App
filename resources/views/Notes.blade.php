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
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #ffffff;
    }

    table {
      width: 80%;
      margin: auto;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #0066cc;
      color: white;
    }

    tr:hover {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>

  <h1>Mes Notes</h1>

  <table>
    <tr>
      <th>Matière</th>
      <th>Contrôle</th>
      <th>Examen</th>
      <th>Moyenne</th>
    </tr>
    <tr>
      <td>Mathématiques</td>
      <td>14</td>
      <td>16</td>
      <td>15</td>
    </tr>
    <tr>
      <td>Informatique</td>
      <td>15</td>
      <td>17</td>
      <td>16</td>
    </tr>
    <tr>
      <td>Physique</td>
      <td>12</td>
      <td>14</td>
      <td>13</td>
    </tr>
  </table>

</body>
</html>

@endsection
