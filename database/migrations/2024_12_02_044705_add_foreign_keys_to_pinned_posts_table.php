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
        Schema::table('pinned_posts', function (Blueprint $table) {
            $table->foreign(['post_id'], 'pinned_posts_ibfk_1')->references(['id'])->on('posts')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pinned_posts', function (Blueprint $table) {
            $table->dropForeign('pinned_posts_ibfk_1');
        });
    }
};
