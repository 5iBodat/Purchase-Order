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
        Schema::table('mst_po_transport', function (Blueprint $table) {
            $table->string('file_po')->nullable();
            $table->string('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_po_transport', function (Blueprint $table) {
            $table->dropColumn('file_po');
            $table->dropColumn('created_by');
        });
    }
};
