<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVoyageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voyage', function (Blueprint $table) {
            $table->foreign(['departement_id'], 'voyage_ibfk_1')->references(['id'])->on('departement');
            $table->foreign(['categorie_id'], 'voyage_ibfk_2')->references(['id'])->on('categorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voyage', function (Blueprint $table) {
            $table->dropForeign('voyage_ibfk_1');
            $table->dropForeign('voyage_ibfk_2');
        });
    }
}
