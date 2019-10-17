<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRcentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcenters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('office_id');
            $table->string('code');
            $table->integer('org_id');
            $table->string('office_code',4);
            $table->string('name');
            $table->integer('manager_id');
            $table->string('address');
            $table->boolean('status');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('rcenters');
    }
}
