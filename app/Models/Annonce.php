<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    /** @use HasFactory<\Database\Factories\AnnonceFactory> */
    use HasFactory;

    /**
     * Get the user that owns the annonce.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the categorie that owns the annonce.
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Get the commentaires for the annonce.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    protected $fillable = ['titre', 'description', 'prix', 'image', 'user_id', 'categorie_id', 'status'];
}
