<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaiementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiement', function (Blueprint $table) {
            $table->foreign(['vente_id'], 'paiement_ibfk_1')->references(['id'])->on('vente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiement', function (Blueprint $table) {
            $table->dropForeign('paiement_ibfk_1');
        });
    }
}
