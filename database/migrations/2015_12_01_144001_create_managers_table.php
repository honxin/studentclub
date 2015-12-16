<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->default('');
            $table->string('password')->default('');
            $table->tinyInteger('role_id')->default(0);
            $table->string('realname')->default('');
            $table->string('sex')->default('');
			$table->string('email')->unique()->default(''); //同时创建索引
            $table->string('qq_num')->default('');
            $table->string('phone_num')->default('');
            $table->tinyInteger('status')->default(0);
            $table->dateTime('reg_time');
            $table->dateTime('login_time');
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
        Schema::drop('managers');
    }
}
