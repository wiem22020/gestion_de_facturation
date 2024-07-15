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
        Schema::create('ligne_facture', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facture_id');
            $table->unsignedBigInteger('article_id');
            $table->string('code_article')->nullable();
            $table->string('descriptionArt');
            $table->decimal('prix_unitaire', 10, 2)->nullable();
            $table->decimal('tva', 5, 2)->nullable();
            $table->integer('quantity');
            $table->decimal('total_ht', 10, 2);
            $table->decimal('total_ttc', 10, 2);


            $table->foreign('facture_id')->references('id')->on('facture')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_facture');
    }
};
