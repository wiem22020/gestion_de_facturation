<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;
    protected $table='reglement';
    protected $fillable = ['codeReg', 'dateReg', 'montant','modalite','facture_id'];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

}
