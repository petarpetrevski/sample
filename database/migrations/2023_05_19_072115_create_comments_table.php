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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('post_id');
            // $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->timestamps();

            // foreign constraint
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete(); // cascade/delete comments when connected post is deleted

            // more concise foreign constraint
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
