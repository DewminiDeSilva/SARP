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
        Schema::create('kurunegala', function (Blueprint $table) {
            $table->id();
            $table->string('folder_name'); // Folder name for relevant activities
            $table->string('image_path')->default('default_image.jpg')->change(); // Path to the uploaded image
            $table->text('description')->nullable(); // Image description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurunegala');
    }
};
