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
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->string('title');
            $table->string('slug')->unique('slug');
            $table->text('content');
            $table->string('description', 500);
            $table->string('keywords', 500);
            $table->integer('avatar')->nullable()->index('fk_posts_avatar');
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected', 'published', 'trash'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
