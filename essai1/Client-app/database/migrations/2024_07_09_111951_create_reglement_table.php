<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reglement', function (Blueprint $table) {
            $table->id();
            
            $table->string('codeReg');
            $table->date('dateReg');
            $table->float('montant');
            $table->string('modalite');
            $table->unsignedBigInteger('facture_id');

            $table->foreign('facture_id')->references('id')->on('facture')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglement');
    }
};
