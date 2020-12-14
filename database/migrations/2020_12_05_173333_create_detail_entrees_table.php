<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_entrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entree_id');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantite');
            $table->integer('prixachat');
            $table->integer('prixvente');
            $table->integer('prixachattotal');
            $table->integer('prixventetotal');
           $table->timestamps();
           $table->foreign('entree_id')
                  ->references('id')
                  ->on('entrees')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
           $table->foreign('produit_id')
                  ->references('id')
                  ->on('produits')
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
        Schema::dropIfExists('detail_entrees');
    }
}
