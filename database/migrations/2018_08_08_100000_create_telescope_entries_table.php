<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelescopeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telescope_entries', function (Blueprint $table) {
            $table->bigIncrements('sequence');
            $table->char('uuid', 36)->unique();
            $table->string('batch_id')->index();
            $table->string('family_hash')->nullable()->index();
            $table->boolean('should_display_on_index')->default(true);
            $table->nullableMorphs('taggable');
            $table->string('type', 20)->index();
            $table->longText('content');
            $table->unsignedInteger('number_of_children')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->index(['batch_id', 'created_at']);
        });

        Schema::create('telescope_entries_tags', function (Blueprint $table) {
            $table->string('entry_uuid');
            $table->string('tag');
        });

        Schema::create('telescope_monitoring', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag')->unique();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telescope_entries');
        Schema::dropIfExists('telescope_entries_tags');
        Schema::dropIfExists('telescope_monitoring');
    }
}
