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
        // 1. Create evaluation_questions table
        Schema::create('evaluation_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('type'); // text, number, radio, textarea
            $table->json('options')->nullable(); // For radio options
            $table->boolean('is_active')->default(true);
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });

        // 2. Modify evaluations table (drop old columns)
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropColumn([
                'name', 
                'age', 
                'origin', 
                'material_clarity', 
                'understanding_improvement', 
                'intention_to_sort', 
                'website_opinion', 
                'suggestion',
                'habit_frequency',
                'knowledge_organic',
                'favorite_material',
                'facilities_rating',
                'advocacy_likelihood'
            ]);
        });

        // 3. Create evaluation_answers table
        Schema::create('evaluation_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained('evaluations')->onDelete('cascade');
            $table->foreignId('evaluation_question_id')->constrained('evaluation_questions')->onDelete('cascade');
            $table->text('answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_answers');
        Schema::dropIfExists('evaluation_questions');
        
        // Re-add columns to evaluations (simplified for rollback)
        Schema::table('evaluations', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('origin')->nullable();
            $table->string('material_clarity')->nullable();
            $table->string('understanding_improvement')->nullable();
            $table->string('intention_to_sort')->nullable();
            $table->text('website_opinion')->nullable();
            $table->text('suggestion')->nullable();
            $table->string('habit_frequency')->nullable();
            $table->string('knowledge_organic')->nullable();
            $table->string('favorite_material')->nullable();
            $table->string('facilities_rating')->nullable();
            $table->string('advocacy_likelihood')->nullable();
        });
    }
};
