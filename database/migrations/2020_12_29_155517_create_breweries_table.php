<?php

use App\Models\Brewery;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreweriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breweries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('img');
            $table->string('address');
            $table->decimal('lon', 11, 8);
            $table->decimal('lat', 10, 8);
            $table->boolean('is_approved')->default(1);
            $table->timestamps();
        });
    
        $path = database_path('seeds/breweries.json');
    // riempio la variabile beers con il contenuto del json salvato in path e lo decodifico perchè sia leggibile al php
        $breweries = json_decode(file_get_contents($path), true);
    //Istanzio direttamente nel model Beer(quindi nella tabella beer) i campi desiderati sfruttando la funzione che ho creato prima per permettere alla compilazione din skippare i campi vuoti 
        foreach($breweries as $brewery){
    //fields è un campo del json che ora ho salvato in beers, che contiene i dati delle singole birre. Guarda il json se vuoi capire meglio 
            $b = new Brewery();
            $b->name = $brewery['name'];
            $b->description = $brewery['description'];
            $b->address = $brewery['address'];
            $b->lat = $brewery['lat'];
            $b->lon = $brewery['lon'];
            $b->img = $brewery['img'];
            $b->save();
        }
    }

    public function down()
    {
        Schema::dropIfExists('breweries');
    }
}
