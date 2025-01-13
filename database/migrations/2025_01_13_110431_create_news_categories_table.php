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
        Schema::create('news_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->bigInteger('parent_id')->nullable()->default(null);
            $table->foreignId('parent_id')->nullable()->constrained('news_categories');
            $table->bigInteger('lft')->nullable()->default(null);
            $table->bigInteger('rgt')->nullable()->default(null);
            $table->tinyInteger('depth')->nullable()->default(null);
            // $table->unsignedBigInteger('created_by');
            // $table->foreign('created_by')->references('id')->on('users');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_categories');
    }
};
