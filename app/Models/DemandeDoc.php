<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DemandeDoc extends Model
{
    use HasFactory;

    protected $table = 'demande_de_doc'; // si tu veux garder ce nom

    protected $fillable = ['type_document', 'message', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
