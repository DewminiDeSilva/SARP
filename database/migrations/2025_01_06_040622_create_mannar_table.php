<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMannarTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mannar', function (Blueprint $table) {
            $table->id();
            $table->string('folder_name'); // Folder name for relevant activities
            $table->string('image_path')->nullable(); // Path to the uploaded image
            $table->text('description')->nullable(); // Image description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mannar');
    }
}
