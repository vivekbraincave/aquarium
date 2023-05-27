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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_name');
            $table->string('image');
            $table->text('address');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('second_address');
            $table->string('telephone');
            $table->text('iframe_src');
            $table->integer('iframe_width');
            $table->integer('iframe_height');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
