<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesRelatedTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('attribute_sets', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attribute_set', '50');
            $table->timestamps();
        });

        Schema::create('attribute_types', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attribute_type', '50');
            $table->timestamps();
        });

        Schema::create('attributes', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attribute', '50');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('attribute_values', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attr_id');
            $table->text('value');
            $table->timestamps();
        });

        Schema::create('has_attributes', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attr_id');
            $table->bigInteger('attr_set');
            $table->bigInteger('attr_type');
            $table->bigInteger('sort_order');
            $table->boolean('is_required');
            $table->timestamps();
        });
        
        Schema::create('product_types', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attribute', '50');
            $table->text('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
