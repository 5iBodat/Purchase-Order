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
        Schema::create('trx_sph', function (Blueprint $table) {
            $table->id();
            $table->string('sph_code');
            $table->string('sph_type', 10);
            $table->tinyInteger('status')->comment('1:Submit 2:Revision 3:Approved');
            $table->string('company_name', 30);
            $table->string('company_pic', 30);
            $table->string('telepon_pic', 20);
            $table->string('product_name');
            $table->decimal('harga', 15);
            $table->decimal('ppn', 15);
            $table->decimal('pbbkb', 15);
            $table->decimal('total', 15);
            $table->string('oatlokasi', 15);
            $table->decimal('hargaoat', 15);
            $table->text('notes')->nullable();
            $table->text('customer_po')->nullable();
            $table->tinyInteger('lastupdate_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_sph');
    }
};
