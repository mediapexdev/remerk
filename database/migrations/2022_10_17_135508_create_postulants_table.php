<?php

use App\Models\Expedition;
use App\Models\Transporteur;
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
        Schema::create('postulants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transporteur::class);
            $table->foreignIdFor(Expedition::class);
            $table->decimal('montant_propose', 10, 2, true);
            $table->boolean('is_choosen');
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
        Schema::dropIfExists('postulants');
    }
};