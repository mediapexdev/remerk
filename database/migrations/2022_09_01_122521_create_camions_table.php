<?php

use App\Models\TypesVehicule;
use App\Models\Transporteur;
use App\Models\LocaliteVehicule;
use App\Models\MarqueCamion;
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
        Schema::create('camions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TypesVehicule::class);
            $table->foreignIdFor(MarqueCamion::class);
            $table->string('modele');
            $table->string('immatriculation');
            $table->float('poids_a_vide');
            $table->float('capacite');
            $table->date('date_mis_en_circulation');
            $table->boolean('est_approuve')->default(false);
            $table->foreignIdFor(Transporteur::class);
            //$table->foreignIdFor(LocaliteVehicule::class);
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
        Schema::dropIfExists('camions');
    }
};
