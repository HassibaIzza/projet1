<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Observations', function (Blueprint $table) {
            $table->id()->primary();;
            $table->string('Année');
            $table->string('Etablissement');
            $table->string('Directeur');
            $table->string('Econome');
            $table->string('Observations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Observations');
    }
};
