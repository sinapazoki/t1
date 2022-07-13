<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('slug')->unique()->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('commentable')->default(0)->comment('0 => uncommentable');
            $table->string('seo_title');
            $table->text('seo_description')->nullable();
            $table->bigInteger('reads')->unsigned()->default(0)->index();
            $table->timestamp('published_at');
            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('category_id')->constrained('post_categories');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
