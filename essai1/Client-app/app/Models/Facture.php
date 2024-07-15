<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Facture extends Model
{
    use HasFactory;
    protected $table = 'facture';
    protected $fillable = ['code', 'date', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ligneFactures()
    {
        return $this->hasMany(LigneFacture::class);
    }
    public function reglement()
    {
        return $this->hasMany(Reglement::class);
    }
}
