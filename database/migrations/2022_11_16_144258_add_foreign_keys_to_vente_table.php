<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vente', function (Blueprint $table) {
            $table->foreign(['client_id'], 'vente_ibfk_1')->references(['id'])->on('client');
            $table->foreign(['voyage_id'], 'vente_ibfk_2')->references(['id'])->on('voyage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vente', function (Blueprint $table) {
            $table->dropForeign('vente_ibfk_1');
            $table->dropForeign('vente_ibfk_2');
        });
    }
}
