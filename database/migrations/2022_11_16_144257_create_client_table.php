<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('prenom', 10)->nullable();
            $table->string('nom', 10)->nullable();
            $table->string('adresse', 28)->nullable();
            $table->string('ville', 19)->nullable();
            $table->string('CP', 7)->nullable();
            $table->string('telephone', 14)->nullable();
            $table->string('courriel', 35)->nullable();
            $table->string('motDePasse', 35);
            $table->string('genre', 1)->nullable();
            $table->integer('province_id')->nullable()->index('province_id');
            $table->integer('premierContact_id')->nullable()->index('premierContact_id');
            $table->integer('admin')->default(0);

            $table->index(['prenom', 'nom'], 'prenom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
