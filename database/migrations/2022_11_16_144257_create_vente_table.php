<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('dateVente')->nullable();
            $table->integer('client_id')->nullable()->index('client_id');
            $table->integer('voyage_id')->nullable()->index('voyage_id');
            $table->integer('quantiteVoyageurs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vente');
    }
}
