<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client', function (Blueprint $table) {
            $table->foreign(['province_id'], 'client_ibfk_1')->references(['id'])->on('province');
            $table->foreign(['premierContact_id'], 'client_ibfk_2')->references(['id'])->on('premiercontact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client', function (Blueprint $table) {
            $table->dropForeign('client_ibfk_1');
            $table->dropForeign('client_ibfk_2');
        });
    }
}
