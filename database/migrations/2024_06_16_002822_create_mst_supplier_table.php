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
        Schema::create('mst_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',30);
            $table->string('nomer_pajak',30);
            $table->text('alamat');
            $table->string('nama_pic',20);
            $table->string('telepon_pic',20);
            $table->string('email_pic',30);
            $table->string('whatsapp',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_supplier');
    }
};
