<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('infrastructure', function (Blueprint $table) {
            if (Schema::hasColumn('infrastructure', 'image_path')) {
                $table->dropColumn('image_path');
            }
            $table->string('pre_image_path')->nullable();
            $table->string('during_image_path')->nullable();
            $table->string('post_image_path')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('infrastructure', function (Blueprint $table) {
            $table->string('image_path')->nullable();
            $table->dropColumn(['pre_image_path', 'during_image_path', 'post_image_path']);
        });
    }
};
