<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected array $tables = [
        'kurunegala',
        'vawniya',
        'mannar',
        'mathale',
        'anuradhapura',
        'puttalam',
        'special_events',
        'others',
    ];

    public function up(): void
    {
        foreach ($this->tables as $tableName) {
            if (!Schema::hasTable($tableName)) {
                continue;
            }
            Schema::table($tableName, function (Blueprint $blueprint) {
                $blueprint->unsignedBigInteger('parent_id')->nullable()->after('id');
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $tableName) {
            if (!Schema::hasTable($tableName)) {
                continue;
            }
            Schema::table($tableName, function (Blueprint $blueprint) {
                $blueprint->dropColumn('parent_id');
            });
        }
    }
};
