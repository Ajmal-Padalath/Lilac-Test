<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user')) {
            Schema::create('user', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('fk_department')->unsigned();
                $table->foreign('fk_department')->references('id')->on('department')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('fk_designation')->unsigned();
                $table->foreign('fk_designation')->references('id')->on('designation')->onDelete('cascade')->onUpdate('cascade');
                $table->string('phone_number');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('user')) {
            $insertUserArray = [
                [ 'id' => 1, 'name' => 'Jhon Due', 'fk_department' => 1, 'fk_designation' => 1, 'phone_number' => 9999999999, 'created_at' => NOW(), 'updated_at' => NOW()],
                [ 'id' => 2, 'name' => 'Tommy Mark', 'fk_department' => 2, 'fk_designation' => 2, 'phone_number' => 8888888888, 'created_at' => NOW(), 'updated_at' => NOW()],
                [ 'id' => 3, 'name' => 'Ajmal', 'fk_department' => 3, 'fk_designation' => 4, 'phone_number' => 7777777777, 'created_at' => NOW(), 'updated_at' => NOW()],
                [ 'id' => 4, 'name' => 'Ram', 'fk_department' => 3, 'fk_designation' => 3, 'phone_number' => 6666666666, 'created_at' => NOW(), 'updated_at' => NOW()],
            ];
    
            $userExists = DB::table('user')->whereIn('id', [1,2,3,4])->first();
            if (empty($userExists)) {
               DB::table('user')->insert($insertUserArray);  
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
