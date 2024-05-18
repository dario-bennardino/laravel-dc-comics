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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 120);
            $table->string('slug', 120)->unique();
            $table->text('description')->nullable();
            $table->text('thumb')->nullable();
            $table->string('price', 10);
            $table->string('series', 60)->nullable();
            $table->date('sale_date');
            $table->string('type', 60);
            // $table->json('artists');
            $table->text('artists');
            // $table->json('writers');
            $table->text('writers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
