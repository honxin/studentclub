<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssocInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AssocInfos', function (Blueprint $table) {
            $table->increments('id');
			$table->tinyInteger('assoc_id');
			$table->string('logo',100);
			$table->char('description');
			$table->text('detailcontent');
			$table->tinyInteger('depart_id');
			$table->tinyInteger('members_id');
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
        Schema::drop('AssocInfos');
    }
}
