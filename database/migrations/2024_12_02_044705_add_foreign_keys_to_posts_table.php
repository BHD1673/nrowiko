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
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign(['avatar'], 'fk_posts_avatar')->references(['id'])->on('uploads')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'], 'posts_ibfk_1')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('fk_posts_avatar');
            $table->dropForeign('posts_ibfk_1');
        });
    }
};
