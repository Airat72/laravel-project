<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMortgagesTable extends Migration
{
    public function up()
    {
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_active')->default(false);
            $table->string('description')->nullable();
            $table->integer('percent')->max(40);
            $table->integer('min_first_payment')->max(98);
            $table->float('max_price');
            $table->float('min_price');
            $table->integer('min_term');
            $table->integer('max_term');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mortgages');
    }
}
