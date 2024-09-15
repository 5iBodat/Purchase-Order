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
        Schema::create('mst_po_transport', function (Blueprint $table) {
            $table->id();
            $table->string('po_number');
            $table->date('po_date');
            $table->string('to');
            $table->string('name');
            $table->text('address');
            $table->string('phone_fax');
            $table->text('comments')->nullable();
            $table->string('requested_by');
            $table->string('shipped_via');
            $table->string('fob_point');
            $table->string('term');
            $table->string('transport');
            $table->string('loading_point')->nullable();
            $table->string('delivered_to');
            $table->decimal('quantity', 10, 2);
            $table->string('description');
            $table->decimal('unit_price', 15, 2);
            $table->decimal('amount', 15, 2);
            $table->text('notes')->nullable();
            $table->tinyInteger('po_status')->comment('1:Waiting Approval 2: Approved 3:Rejected')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_po_tranport');
    }
};
