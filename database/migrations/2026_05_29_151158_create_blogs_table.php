<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('author')->nullable();
            $table->string('main_image')->nullable();
            $table->text('categories')->nullable(); // json or comma-separated
            $table->text('tags')->nullable(); // json or comma-separated
            $table->string('status')->default('Published');
            $table->string('callout_title')->nullable();
            $table->text('callout_items')->nullable(); // JSON list containing key points
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
