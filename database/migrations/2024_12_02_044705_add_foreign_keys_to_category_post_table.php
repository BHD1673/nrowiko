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
        Schema::table('category_post', function (Blueprint $table) {
            $table->foreign(['post_id'], 'category_post_ibfk_1')->references(['id'])->on('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['category_id'], 'category_post_ibfk_2')->references(['id'])->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_post', function (Blueprint $table) {
            $table->dropForeign('category_post_ibfk_1');
            $table->dropForeign('category_post_ibfk_2');
        });
    }
};
