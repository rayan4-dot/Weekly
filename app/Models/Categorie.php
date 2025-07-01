<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;

    /**
     * Get the annonces for the categorie.
     */
    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }

    protected $fillable = ['nom', 'slug'];
}
