<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code_initial')->nullable();
            $table->string('sale_code_initial')->nullable();
            $table->string('item_code_initial')->nullable();
            $table->string('purchase_terminal')->nullable();
            $table->string('sale_terminal')->nullable();
            $table->string('menu_position')->nullable();
            $table->string('brand_logo_variant')->nullable();
            $table->string('navbar_variant')->nullable();
            $table->string('sidebar_variant')->nullable();
            $table->string('flat_sidebar')->nullable();
            $table->string('sidebar_child_menu')->nullable();
            $table->integer('vat_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
