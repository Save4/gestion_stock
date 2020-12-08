<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!schema::hasTable('produits')){Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomproduit');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('unitemesure_id');
            $table->integer('prixachat');
            $table->integer('prixvente');
            $table->timestamps();
            $table->foreign('unitemesure_id')
                  ->references('id')
                  ->on('unitemesures')
                  ->onDelete('cascade');
           $table->foreign('categorie_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');      
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
