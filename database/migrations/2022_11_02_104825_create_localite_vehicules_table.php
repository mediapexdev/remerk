<?php

use App\Models\Commune;
use App\Models\Arrondissement;
use App\Models\Departement;
use App\Models\Region;
use App\Models\Camion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localite_vehicules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Camion::class)->unique();
            $table->foreignIdFor(Region::class);
            $table->foreignIdFor(Departement::class);
            $table->foreignIdFor(Arrondissement::class)->nullable();
            $table->foreignIdFor(Commune::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localite_vehicules');
    }
};
