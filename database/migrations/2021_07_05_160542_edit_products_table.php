<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_header_ratio')->after('last_visit')->nullable();
            $table->string('image_header_image')->after('image_header_ratio')->nullable();
            $table->string('size_color_pickers')->after('image_header_image')->nullable();
            $table->string('description_style')->after('size_color_pickers')->nullable();
            $table->string('checkout_style')->after('description_style')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
