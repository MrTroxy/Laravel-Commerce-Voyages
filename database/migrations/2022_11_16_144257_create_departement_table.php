<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codeDepartement', 3);
            $table->string('nomDepartement', 23)->nullable()->index('nomDepartement');
            $table->integer('region_id')->nullable()->index('region_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departement');
    }
}
