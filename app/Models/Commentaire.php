<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    /** @use HasFactory<\Database\Factories\CommentaireFactory> */
    use HasFactory;

    /**
     * Get the user that owns the commentaire.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the annonce that owns the commentaire.
     */
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

    protected $fillable = ['contenu', 'user_id', 'annonce_id'];
}
