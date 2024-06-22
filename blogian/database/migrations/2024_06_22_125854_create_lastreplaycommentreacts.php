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
        Schema::create('lastreplaycommentreacts', function (Blueprint $table) {
            $table->id();
            $table->text('value')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('post_id')->nullable(false);
            $table->unsignedBigInteger('comment_id')->nullable(false);
            $table->unsignedBigInteger('replay_comment_id')->nullable(false);
            $table->unsignedBigInteger('last_replay_comment_id')->nullable(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('replay_comment_id')->references('id')->on('replaycomments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('last_replay_comment_id')->references('id')->on('last_replay_comments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lastreplaycommentreacts');
    }
};
