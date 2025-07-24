<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->unsignedBigInteger('youth_proposal_id')->nullable()->after('project_type');
        
            // Optional: Add foreign key constraint
            $table->foreign('youth_proposal_id')->references('id')->on('youth_proposals')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->dropForeign(['youth_proposal_id']);
            $table->dropColumn('youth_proposal_id');
        });
    }

};
