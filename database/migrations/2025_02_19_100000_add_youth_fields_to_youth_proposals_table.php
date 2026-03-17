<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('youth_proposals', function (Blueprint $table) {
            $table->string('business_type')->nullable()->after('category'); // New Business / Existing Business
            $table->string('nic_number')->nullable()->after('contact_person');
            $table->date('birth_date')->nullable()->after('nic_number');
            $table->json('implementation_plans')->nullable()->after('implementation_plan'); // [{name, path}, ...]
        });
    }

    public function down(): void
    {
        Schema::table('youth_proposals', function (Blueprint $table) {
            $table->dropColumn(['business_type', 'nic_number', 'birth_date', 'implementation_plans']);
        });
    }
};
