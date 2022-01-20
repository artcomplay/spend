<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {

            $table->increments('id');
                
            $table->string('element_name');

            $table->float('element_quantity', 8, 2);

            $table->string('element_unit_measurement');

            $table->float('element_price', 8, 2);

            $table->string('category_id');
            
            $table->integer('user_id');

            $table->dateTime('created_at');

            $table->dateTime('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
}
