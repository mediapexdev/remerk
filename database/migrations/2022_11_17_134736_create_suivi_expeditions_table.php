<?php

use App\Models\EtatExpedition;
use App\Models\Expedition;
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
        Schema::create('suivi_expeditions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Expedition::class);
            $table->foreignIdFor(EtatExpedition::class);
            $table->date('date_modification');
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
        Schema::dropIfExists('suivi_expeditions');
    }
};
