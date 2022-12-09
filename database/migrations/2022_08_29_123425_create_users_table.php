<?php

use App\Models\Role;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('phone')->unique();
            $table->timestamp('phone_verified_at');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->foreignIdFor(Role::class);
            $table->longText('avatar')->nullable();
            $table->string('avatar_file_name')->nullable();
            $table->string('folder_path')->unique();
            $table->longText('fcm_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
