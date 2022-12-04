<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panier', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ip_client', 16)->nullable();
            $table->integer('voyage_id')->index('panier_ibfk_1');
            $table->integer('quantite');
            $table->integer('client_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panier');
    }
}
