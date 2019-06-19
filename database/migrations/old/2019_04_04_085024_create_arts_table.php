<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('image');
            $table->integer('artist_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->dateTime('date')->nullable(true);
            $table->integer('view_count')->default(0);
            $table->text('seo_title')->nullable(true);
            $table->text('seo_keyword')->nullable(true);
            $table->text('seo_description')->nullable(true);
            $table->boolean('status')->default(false);
            $table->boolean('featured')->default(false);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('artist_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arts');
    }
}
