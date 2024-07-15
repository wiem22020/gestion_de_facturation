<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = ['codeArt', 'descriptionArt', 'prixUnitaireHT', 'tvaArt', 'prixUnitaireTTC'];

    public function ligneFactures()
    {
        return $this->hasMany(LigneFacture::class);
    }
}
