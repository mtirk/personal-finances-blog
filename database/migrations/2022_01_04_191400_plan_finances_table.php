<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->double('housing')->nullable(true);
            $table->double('transportation')->nullable(true);
            $table->double('food')->nullable(true);
            $table->double('utilities')->nullable(true);
            $table->double('clothing')->nullable(true);
            $table->double('healthcare')->nullable(true);
            $table->double('insurance')->nullable(true);
            $table->double('household_supplies')->nullable(true);
            $table->double('personal')->nullable(true);
            $table->double('debt')->nullable(true);
            $table->double('retirement')->nullable(true);
            $table->double('education')->nullable(true);
            $table->double('savings')->nullable(true);
            $table->double('gifts')->nullable(true);
            $table->double('entertainment')->nullable(true);
            $table->double('unexpected')->nullable(true);
            $table->unsignedSmallInteger('year');
            $table->timestamps(); // adds both created_at and updated_at columns
            $table->unsignedBigInteger('month_id');
            $table->foreign('month_id')->references('id')->on('months');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); //foreign key to create_users_table table users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
