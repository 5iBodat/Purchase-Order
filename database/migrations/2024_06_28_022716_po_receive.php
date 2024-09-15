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
        Schema::create('po_receive', function (Blueprint $table) {
            $table->id();
            $table->string('sph_code');
            $table->string('po_no')->nullable();
            $table->string('po_file')->nullable();
            $table->smallInteger('po_status')->comment('1: Waiting 2:Uploaded 3:Archived');
            $table->smallInteger('received_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_receive');
    }
};
