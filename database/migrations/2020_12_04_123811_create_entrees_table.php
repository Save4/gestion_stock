<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fournisseur_id');
            $table->unsignedBigInteger('magasin_id');
           $table->unsignedBigInteger('type_entree_id');
           $table->unsignedBigInteger('mode_paiement_id');
           $table->integer('montant');
           $table->date('date_entree');
           $table->boolean('etat_cloture');
           $table->timestamps();
           $table->foreign('fournisseur_id')
                  ->references('id')
                  ->on('fournisseurs')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
           $table->foreign('magasin_id')
                  ->references('id')
                  ->on('magasins')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('type_entree_id')
                  ->references('id')
                  ->on('typeentrees')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('mode_paiement_id')
                  ->references('id')
                  ->on('mode_paiements')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrees');
    }
}
