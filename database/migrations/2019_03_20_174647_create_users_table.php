<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 11)->unique()->nullalbe();
            $table->string('nome', 50);
            $table->string('phone', 11);
            $table->date('birth')->nullable();
            $table->string('gender', 1)->nullable();
            $table->text('notes')->nullable();

            // Auth data
            $table->string('email', 50)->unique();
            $table->string('password', 254)->nullable();

            //Permission
            $table->string('status')->default('active');
            $table->string('permission')->default('app.user');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){

        });
        Schema::dropIfExists('users');
    }
}
