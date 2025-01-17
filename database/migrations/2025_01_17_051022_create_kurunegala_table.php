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
        // Create the 'kurunegala' table
        Schema::create('kurunegala', function (Blueprint $table) {
            $table->id();
            $table->string('folder_name'); // Folder name for relevant activities
            $table->string('image_path')->nullable()->default('default_image.jpg'); // Path to the uploaded image
            $table->text('description')->nullable(); // Image description
            $table->timestamps();
        });

        // Update the 'image_path' column to allow null values
        Schema::table('kurunegala', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the updates to the 'kurunegala' table
        Schema::table('kurunegala', function (Blueprint $table) {
            $table->string('image_path')->nullable(false)->change(); // Revert back to not nullable
        });

        // Drop the 'kurunegala' table
        Schema::dropIfExists('kurunegala');
    }
};
