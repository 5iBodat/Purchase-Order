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
        Schema::create('mst_po_details', function (Blueprint $table) {
            $table->id();
            $table->string('po_id');
            $table->smallInteger('qty');
            $table->string('description');
            $table->decimal('unit_price',12);
            $table->decimal('amount',12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_po_details', function (Blueprint $table) {
            //
        });
    }
};
