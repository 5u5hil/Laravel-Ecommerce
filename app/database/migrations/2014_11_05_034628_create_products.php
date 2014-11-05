<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProducts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product');
            $table->string('short_desc');
            $table->text('long_desc');
            $table->text('images');
            $table->bigInteger('prod_type');
            $table->bigInteger('attr_set');
            $table->string('url_key');
            $table->boolean('is_avail');
            $table->bigInteger('stock');
            $table->decimal('price');
            $table->decimal('spl_price');
            $table->boolean('is_crowd_funded');
            $table->datetime('target_date');
            $table->bigInteger('target_qty');
            $table->bigInteger('parent_prod_id');
            $table->string('meta_title', '100');
            $table->text('meta_keys');
            $table->text('meta_desc');
            $table->boolean('is_cod');
            $table->bigInteger('added_by');
            $table->bigInteger('updated_by');
            $table->text('related_prods');
            $table->text('upsell_prods');
            $table->text('is_individual');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('products');
    }

}
