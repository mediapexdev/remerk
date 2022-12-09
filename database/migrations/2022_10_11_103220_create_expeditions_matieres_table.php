<?php

use App\Models\Expedition;
use App\Models\Matiere;
use App\Models\PoidsMatiere;
use App\Models\TypesVehicule;
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
        Schema::create('expeditions_matieres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Expedition::class)->unique();
            $table->foreignIdFor(Matiere::class);
            $table->foreignIdFor(PoidsMatiere::class);
            $table->foreignIdFor(TypesVehicule::class);
            $table->unsignedSmallInteger('nombre_vehicules');
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
        Schema::dropIfExists('expeditions_matieres');
    }
};
