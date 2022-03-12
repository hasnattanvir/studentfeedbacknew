<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('roll')->unique();
            $table->string('regi')->unique();
            $table->string('faculty');
            $table->string('department');
            $table->string('batch');
            $table->string('phone');
            $table->string('shift');
            $table->string('status')->default(0);
            $table->string('type')->default(0);
            $table->string('password');
            $table->rememberToken();
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
        //
    }
}
