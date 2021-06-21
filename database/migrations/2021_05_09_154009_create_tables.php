<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('citta');
            $table->string('indirizzo');
            $table->integer('nCiv');
            $table->unsignedBigInteger('telefono');
            $table->integer('multisala');
        });

        Schema::create('film', function (Blueprint $table) {
            $table->bigIncrements('idFilm');
            $table->timestamps();
            $table->string('titolo')->unique();
            $table->string('genere');
            $table->date('uscita');
            $table->string('regista');
            $table->integer('vmd');
            $table->time('durata');
            $table->string('attori');
            $table->text('desc');
        });

        Schema::create('sala', function (Blueprint $table) {
            $table->bigIncrements('idSala');
            $table->timestamps();
            $table->integer('capienza');
            $table->unsignedBigInteger('cinema');
            $table->foreign('cinema')->references('id')->on('cinema');
        });

        Schema::create('proiezione', function (Blueprint $table) {
            $table->bigIncrements('idProiez');
            $table->timestamps();
            $table->unsignedBigInteger('sala');
            $table->unsignedBigInteger('film');
            $table->date('data');
            $table->time('orario');
            $table->integer('bigVend');
            $table->foreign('sala')->references('idSala')->on('sala');
            $table->foreign('film')->references('idFilm')->on('film');
        });
        
        Schema::create('carrello', function (Blueprint $table) {
            $table->bigIncrements('idCar');
            $table->timestamps();
            $table->string('utente');
            $table->unsignedBigInteger('proiezione');
            $table->integer('quantita');
            $table->decimal('tipologia', 2, 2);
            $table->foreign('proiezione')->references('idProiez')->on('proiezione');
            $table->foreign('utente')->references('email')->on('users');
        });
        
        Schema::create('vendite', function (Blueprint $table) {
            $table->bigIncrements('idAcq');
            $table->timestamps();
            $table->string('utente');
            $table->unsignedBigInteger('proiezione');
            $table->integer('quantita');
            $table->decimal('tipologia', 2, 2);
            $table->foreign('proiezione')->references('idProiez')->on('proiezione');
            $table->foreign('utente')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema');
        Schema::dropIfExists('film');
        Schema::dropIfExists('sala');
        Schema::dropIfExists('proiezione');
        Schema::dropIfExists('carrello');
        Schema::dropIfExists('vendite');
    }
}
