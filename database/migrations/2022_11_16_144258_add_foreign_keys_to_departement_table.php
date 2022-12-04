<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departement', function (Blueprint $table) {
            $table->foreign(['region_id'], 'departement_ibfk_1')->references(['id'])->on('region');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departement', function (Blueprint $table) {
            $table->dropForeign('departement_ibfk_1');
        });
    }
}
