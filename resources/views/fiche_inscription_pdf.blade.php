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
      min-height: 100vh;
    }

    .container {
      background: #fff;
      padding: 30px 40px;
      max-width: 600px;
      width: 100%;
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
      margin: 0 auto 20px;
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #3498db;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .info-row {
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

    .next-to {
      color: #111;
      word-break: break-word;
    } 

    .value {
      text-align: center;
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
    <h1>Fiche d'inscription</h1>

    <div class="info-row">
   <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
    <tr>
      <td style="width : 25%;">Nom :</td>
      <td style="width : 25%;">{{ $inscription->user->name }}</td>
      <td>
      @if($inscription->photo)
      <img src="{{ public_path('uploads/photos/' . $inscription->photo) }}" alt="Photo de {{ $inscription->user->name }}" class="photo" style="width: 150px; height: auto;">
      @endif
      </td>
    </tr>
   </table>
  </div>

  <div class="info-row">
   <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
    <tr>
      <td class="label">CNE :</td>
      <td class="next-to">{{ $inscription->cne }}</td>
      <td class="label">CIN :</td>
      <td class="next-to">{{ $inscription->cin }}</td>
    </tr>
   </table>
  </div>

  <div class="info-row">
    <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
     <tr>
      <td class="label">Date de naissance :</td>
      <td class="next-to">{{ $inscription->date_naiss }}</td>
      <td class="label">Genre :</td>
      <td class="next-to">{{ $inscription->genre }}</td>
     </tr>
    </table>
  </div>

    <div class="info-row">
      <div class="label">Adresse :</div>
      <div class="value">{{ $inscription->adresse }}</div>
    </div>

   <div class="info-row">
     <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
      <tr>
        <td class="label">Nom du père :</td>
        <td class="next-to">{{ $inscription->f_f_name }}</td>
        <td class="label">Nom du mère :</td>
        <td class="next-to">{{ $inscription->m_f_name }}</td>
      </tr>
     </table>
   </div>

  <div class="info-row">
     <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
      <tr>
        <td class="label">Profession du Père :</td>
        <td class="next-to">{{ $inscription->f_profession }}</td>
        <td class="label">Profession du Mère :</td>
        <td class="next-to">{{ $inscription->m_profession }}</td>
      </tr>
     </table>
  </div>
    
  <div class="info-row">
     <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
      <tr>
        <td class="label">Tél. Père :</td>
        <td class="next-to">{{ $inscription->f_tel }}</td>
        <td class="label">Tél. Mère :</td>
        <td class="next-to">{{ $inscription->m_tel }}</td>
      </tr>
     </table>
  </div>

    <div class="info-row">
      <div class="label">Email :</div>
      <div class="value">{{ $inscription->user->email }}</div>
    </div>

    <div class="info-row">
     <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
      <tr>
        <td class="label">Téléphone :</td>
        <td class="next-to">{{ $inscription->telephone }}</td>
        <td class="label">Série du Bac :</td>
        <td class="next-to">{{ $inscription->bac_serie }}</td>
      </tr>
     </table>
  </div>

  <div class="info-row">
     <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
      <tr>
        <td class="label">Mention Bac :</td>
        <td class="next-to">{{ $inscription->bac_mention }}</td>
        <td class="label">Niveau :</td>
        <td class="next-to">{{ $inscription->niveau_actuel }}</td>
      </tr>
     </table>
  </div>

  <div class="info-row">
     <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
      <tr>
        <td class="label">Modules Validés :</td>
        <td class="next-to">{{ $inscription->modules_valides }}</td>
        <td class="label">Inscription Bac Académie :</td>
        <td class="next-to">{{ $inscription->bac_town }}</td>
      </tr>
     </table>
  </div>

    <div class="info-row">
      <div class="label">Motif :</div>
      <div class="value">{{ $inscription->motif }}</div>
    </div>
  </div>

</body>
</html>


