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
        Schema::create('news_has_categories', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('news_id'); 
            // $table->unsignedBigInteger('news_category_id'); 
            // $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade'); $table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade'); 
            // $table->unique(['news_id', 'news_category_id']);

            $table->foreignId('news_id')->constrained('news')->onDelete('cascade'); $table->foreignId('news_category_id')->constrained('news_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_has_categories');
    }
};
