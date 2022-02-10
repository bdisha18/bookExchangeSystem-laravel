<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondbooks', function (Blueprint $table) {
            $table->bigIncrements('secondbook_id');
            $table->string('book_name');
            $table->string('author_name');
            $table->integer('user_id');
            $table->string('price');
            $table->string('image');
            $table->integer('years');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secondbooks');
    }
}
