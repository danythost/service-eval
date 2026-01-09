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
        Schema::table('services', function (Blueprint $table) {
            $table->text('preferred_colors')->nullable();
            $table->text('executives')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->text('social_media_links')->nullable();
            $table->text('history')->nullable();
            $table->text('achievements')->nullable();
            $table->string('email')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('business_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('street_address')->nullable();
            $table->text('google_maps_link')->nullable();
            $table->string('operating_hours')->nullable();
            $table->text('customer_categories')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'preferred_colors',
                'executives',
                'portfolio_link',
                'social_media_links',
                'history',
                'achievements',
                'email',
                'provider_name',
                'business_name',
                'phone',
                'street_address',
                'google_maps_link',
                'operating_hours',
                'customer_categories',
            ]);
        });
    }
};
