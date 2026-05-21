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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type', 100)->nullable();
            $table->string('subtitle', 500)->nullable();
            $table->text('description')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('tags')->nullable();
            $table->string('status', 50)->default('Active');
            $table->boolean('is_featured')->default(false);
            $table->string('client')->nullable();
            $table->string('duration')->nullable();
            $table->string('technologies')->nullable();
            $table->text('overview')->nullable();
            
            // Key Results (3 items)
            $table->string('result_1_value')->nullable();
            $table->string('result_1_title')->nullable();
            $table->text('result_1_description')->nullable();
            
            $table->string('result_2_value')->nullable();
            $table->string('result_2_label')->nullable();
            
            $table->string('result_3_title')->nullable();
            $table->text('result_3_description')->nullable();
            
            // Technical Implementation (3 items)
            $table->string('impl_1_title')->nullable();
            $table->text('impl_1_description')->nullable();
            
            $table->string('impl_2_title')->nullable();
            $table->text('impl_2_description')->nullable();
            
            $table->string('impl_3_title')->nullable();
            $table->text('impl_3_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
