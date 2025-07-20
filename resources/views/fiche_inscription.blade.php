@extends('layout')
@section('title', "ENCG El Jadida")
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f7f8;
      color: #333;
      margin:0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      background: #fff;
      padding: 30px 40px;
      max-width: 600px;
      width: 100%;
      margin-top:200px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      border-radius: 10px;
      text-align: left;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 25px;
      font-weight: 700;
      font-size: 28px;
    }

    .photo {
      display: block;
      margin: 0 auto 20px;
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #3498db;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid #eee;
      font-size: 16px;
    }

    .info-row:last-child {
      border-bottom: none;
    }

    .label {
      font-weight: 600;
      color: #555;
      flex-basis: 45%;
    }

    .value {
      flex-basis: 50%;
      text-align: right;
      color: #111;
      word-break: break-word;
    }

    @media (max-width: 480px) {
      .container {
        padding: 20px;
      }
      .info-row {
        flex-direction: column;
        text-align: left;
      }
      .value {
        text-align: left;
        margin-top: 3px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Fiche d'inscription CNAEM</h1>

    @if($inscription->photo)
      <img src="{{ asset('uploads/photos/' . $inscription->photo) }}" alt="Photo de {{ $inscription->user->name }}" class="photo">
    @endif

    <div class="info-row">
      <div class="label">Nom :</div>
      <div class="value">{{ $inscription->user->name }}</div>
    </div>
    <div class="info-row">
      <div class="label">CNE :</div>
      <div class="value">{{ $inscription->cne }}</div>
    </div>
    <div class="info-row">
      <div class="label">CIN :</div>
      <div class="value">{{ $inscription->cin }}</div>
    </div>
    <div class="info-row">
      <div class="label">Date de naissance :</div>
      <div class="value">{{ $inscription->date_naiss }}</div>
    </div>
    <div class="info-row">
      <div class="label">Genre :</div>
      <div class="value">{{ $inscription->genre }}</div>
    </div>
    <div class="info-row">
      <div class="label">Adresse :</div>
      <div class="value">{{ $inscription->adresse }}</div>
    </div>
    <div class="info-row">
      <div class="label">Nom du père :</div>
      <div class="value">{{ $inscription->f_f_name }}</div>
    </div>
    <div class="info-row">
      <div class="label">Nom du mère :</div>
      <div class="value">{{ $inscription->m_f_name }}</div>
    </div>
    <div class="info-row">
      <div class="label">Profession du Père :</div>
      <div class="value">{{ $inscription->f_profession }}</div>
    </div>
    <div class="info-row">
      <div class="label">Profession du Mère :</div>
      <div class="value">{{ $inscription->m_profession }}</div>
    </div>
    <div class="info-row">
      <div class="label">Tél. Père :</div>
      <div class="value">{{ $inscription->f_tel }}</div>
    </div>
    <div class="info-row">
      <div class="label">Tél. Mère :</div>
      <div class="value">{{ $inscription->m_tel }}</div>
    </div>
    <div class="info-row">
      <div class="label">Email :</div>
      <div class="value">{{ $inscription->user->email }}</div>
    </div>
    <div class="info-row">
      <div class="label">Téléphone :</div>
      <div class="value">{{ $inscription->telephone }}</div>
    </div>
    <div class="info-row">
      <div class="label">Série du Bac :</div>
      <div class="value">{{ $inscription->bac_serie }}</div>
    </div>
    <div class="info-row">
      <div class="label">Mention Bac :</div>
      <div class="value">{{ $inscription->bac_mention }}</div>
    </div>
    <div class="info-row">
      <div class="label">Niveau :</div>
      <div class="value">{{ $inscription->niveau_actuel }}</div>
    </div>
    <div class="info-row">
      <div class="label">Modules Validés :</div>
      <div class="value">{{ $inscription->modules_valides }}</div>
    </div>
    <div class="info-row">
      <div class="label">Inscription Bac Académie :</div>
      <div class="value">{{ $inscription->bac_town }}</div>
    </div>
    <div class="info-row">
      <div class="label">Motif :</div>
      <div class="value">{{ $inscription->motif }}</div>
    </div>

    <a href="{{ route('fiche_inscription.pdf', ['id' => $inscription->id]) }}" class="btn btn-primary" target="_blank">
  Télécharger en PDF
</a>

  </div>

</body>
</html>

@endsection
