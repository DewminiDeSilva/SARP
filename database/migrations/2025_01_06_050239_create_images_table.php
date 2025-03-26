<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        if (!Schema::hasTable('images')) {
            Schema::create('images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('folder_id');
                $table->string('album_name')->nullable()->change();
                $table->string('image_path')->nullable()->change();
                $table->timestamps();
    
                // No foreign key if folders are stored in album-specific tables
            });
        }
    }
    
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
    
    
};