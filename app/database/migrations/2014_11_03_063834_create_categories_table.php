<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categories', function(Blueprint $table) {
            // These columns are needed for Baum's Nested Set implementation to work.
            // Column names may be changed, but they *must* all exist and be modified
            // in the model.
            // Take a look at the model scaffold comments for details.
            // We add indexes on parent_id, lft, rgt columns by default.
            $table->bigIncrements('id');
            $table->string('category', '50');
            $table->string('short_desc', '200');
            $table->text('long_desc');
            $table->text('images');
            $table->boolean('is_active');
            $table->boolean('is_nav');
            $table->string('url_key', '20');
            $table->string('meta_title', '100');
            $table->text('meta_keys');
            $table->text('meta_desc');
            $table->bigInteger('sort_order');
            $table->bigInteger('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('categories');
    }

}
