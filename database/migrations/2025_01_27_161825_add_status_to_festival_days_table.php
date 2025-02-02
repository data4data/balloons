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
        Schema::table('festival_days', function (Blueprint $table) {
                $table->enum('status', ['active','canceled'])->default('active')->after('description');
                $table->renameColumn('name','date');
                $table->date('date')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('festival_days', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->renameColumn('date','name');
            $table->string('date')->change();

        });
    }
};
