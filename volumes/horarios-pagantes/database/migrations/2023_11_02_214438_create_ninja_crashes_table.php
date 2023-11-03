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
        Schema::create('ninja_crashes', function (Blueprint $table) {
			$table->id();
			$table->decimal('porcentagem');
			$table->date('data');
			$table->integer('hora');
			$table->json('horarios');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninja_crashes');
    }
};
