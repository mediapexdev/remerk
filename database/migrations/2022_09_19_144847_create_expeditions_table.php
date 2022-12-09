<?php

use App\Models\Expediteur;
use App\Models\EtatExpedition;
use App\Models\Transporteur;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expeditions', function (Blueprint $table) {
            $table->id();
            $table->string('string_id')->unique()->nullable();
            $table->foreignIdFor(Expediteur::class);
            $table->foreignIdFor(Transporteur::class)->nullable();
            $table->foreignIdFor(EtatExpedition::class);
            $table->string('code')->nullable();
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
        Schema::dropIfExists('expeditions');
    }
};
