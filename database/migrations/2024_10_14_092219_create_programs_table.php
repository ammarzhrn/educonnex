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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sector'); // Ensure this is unsigned if 'id' in sectors is unsigned
            $table->string('title');
            $table->text('description');
            $table->string('proposal')->nullable();
            $table->string('contact');
            $table->string('thumbnail');
            $table->foreign('id_sector')->references('id')->on('sectors')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
