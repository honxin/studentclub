<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssocAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assocAccounts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('password')->default('');
            $table->tinyInteger('assoc_id');
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
        Schema::drop('assocAccounts');
    }
}
