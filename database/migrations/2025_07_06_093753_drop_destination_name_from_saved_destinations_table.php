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
    Schema::table('saved_destinations', function (Blueprint $table) {
        $table->dropColumn('destination_name');
    });
}

public function down(): void
{
    Schema::table('saved_destinations', function (Blueprint $table) {
        $table->string('destination_name');
    });
}

};
