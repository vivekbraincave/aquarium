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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('small_logo')->nullable();
            $table->string('large_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('website_name')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number1')->nullable();
            $table->string('contact_number2')->nullable();
            $table->string('contact_number3')->nullable();
            $table->string('contact_number4')->nullable();
            $table->string('email_address1')->nullable();
            $table->string('email_address2')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            //
        });
    }
};
