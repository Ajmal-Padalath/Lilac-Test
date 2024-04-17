<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('designation')) {
            Schema::create('designation', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('designation')) {
            $insertDesignationArray = [
                [ 'id' => 1, 'name' => 'Marketing Manager', 'created_at' => NOW(), 'updated_at' => NOW()],
                [ 'id' => 2, 'name' => 'Mobile Application De.', 'created_at' => NOW(), 'updated_at' => NOW() ],
                [ 'id' => 3, 'name' => 'CEO', 'created_at' => NOW(), 'updated_at' => NOW() ],
                [ 'id' => 4, 'name' => 'Operation Manager', 'created_at' => NOW(), 'updated_at' => NOW() ],
            ];
    
            $designationExists = DB::table('designation')->whereIn('id', [1,2,3])->first();
            if (empty($designationExists)) {
               DB::table('designation')->insert($insertDesignationArray);  
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
        Schema::dropIfExists('designation');
    }
}
