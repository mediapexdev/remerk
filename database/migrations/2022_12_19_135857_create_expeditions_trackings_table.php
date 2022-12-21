<?php

use App\Models\Expedition;
use App\Models\EtatExpedition;
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
        Schema::create('expeditions_trackings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Expedition::class)->unique();
            $table->foreignIdFor(EtatExpedition::class);
            $table->date('date_select_postulant')->nullable();
            $table->date('date_paiement')->nullable();
            $table->date('date_chargement')->nullable();
            $table->date('date_depart')->nullable();
            $table->date('date_transit')->nullable();
            $table->date('date_arrivee')->nullable();
            $table->date('date_dechargement')->nullable();
            $table->date('date_livraison')->nullable();
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
        Schema::dropIfExists('expeditions_trackings');
    }
};
