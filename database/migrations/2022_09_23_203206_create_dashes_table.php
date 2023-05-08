<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashes', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("mat")->nullable();
            $table->string("eng")->nullable();
            $table->string("che")->nullable();
            $table->string("phy")->nullable();
            $table->string("bio")->nullable();
            $table->string("ave")->nullable();
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
        Schema::dropIfExists('dashes');
    }
}
