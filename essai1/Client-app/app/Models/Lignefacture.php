<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lignefacture extends Model
{
    use HasFactory;
    protected $table="ligne_facture";
    protected $fillable = [
        'facture_id', 'article_id','descriptionArt', 'code_article', 'prix_unitaire', 'tva', 'quantity', 'total_ht', 'total_ttc'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
