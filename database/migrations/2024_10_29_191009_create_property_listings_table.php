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
        Schema::create('property_listings', function (Blueprint $table) {
            $table->id('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('area_sqft')->nullable();
            $table->boolean('published')->default(false);
            $table->string('location')->nullable();
            $table->year('year_built')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->date('list_date')->nullable();
            $table->date('sold_date')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->unsignedBigInteger('featured_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('property_type_id')->references('id')->on('property_types');
            $table->foreign('featured_id')->references('id')->on('property_features');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_listings');
    }
};
