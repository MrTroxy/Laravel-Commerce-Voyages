<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('panier', function (Blueprint $table) {
            $table->foreign(['voyage_id'], 'panier_ibfk_1')->references(['id'])->on('voyage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('panier', function (Blueprint $table) {
            $table->dropForeign('panier_ibfk_1');
        });
    }
}
