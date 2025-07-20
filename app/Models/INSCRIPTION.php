<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class INSCRIPTION extends Model
{
    use HasFactory;

    protected $table = 'inscri'; // nom de la table (correctement lié ici)

    protected $fillable = [
        'user_id', 'cne', 'cin', 'date_naiss', 'adresse', 'photo', 'genre',
        'f_f_name', 'm_f_name', 'f_profession', 'm_profession',
        'f_tel', 'm_tel', 'telephone', 'bac_serie', 'bac_mention',
        'niveau_actuel', 'modules_valides', 'bac_town', 'motif'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}