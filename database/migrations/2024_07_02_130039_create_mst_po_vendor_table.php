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
        Schema::create('mst_po_vendor', function (Blueprint $table) {
            $table->id();
            $table->string('po_numbers')->nullable();
            $table->string('sph_code');
            $table->string('po_type',20)->comment('Transporter , Supplier')->nullable();
            $table->date('po_date')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('shipped_by')->nullable();
            $table->string('fob')->nullable();
            $table->string('term')->nullable();
            $table->string('transport')->nullable();
            $table->tinyInteger('po_status')->comment('1:Waiting Approval 2: Approved 3:Rejected')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_po_vendor', function (Blueprint $table) {
            //
        });
    }
};
