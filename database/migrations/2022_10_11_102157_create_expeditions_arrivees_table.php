<?php

use App\Models\Region;
use App\Models\Commune;
use App\Models\Expedition;
use App\Models\Departement;
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
        Schema::create('expeditions_arrivees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Expedition::class)->unique();
            $table->foreignIdFor(Region::class);
            $table->foreignIdFor(Departement::class);
            $table->foreignIdFor(Commune::class);
            $table->string('adresse_reelle');
            $table->string('nom_contact_sur_place')->nullable();
            $table->string('phone_contact_sur_place')->nullable();
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
        Schema::dropIfExists('expeditions_arrivees');
    }
};
