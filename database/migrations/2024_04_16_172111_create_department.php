<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('department')) {
            Schema::create('department', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('department')) {
            $insertDepartmentArray = [
                [ 'id' => 1, 'name' => 'Sales and marketing', 'created_at' => NOW(), 'updated_at' => NOW()],
                [ 'id' => 2, 'name' => 'Application development', 'created_at' => NOW(), 'updated_at' => NOW() ],
                [ 'id' => 3, 'name' => 'Operations', 'created_at' => NOW(), 'updated_at' => NOW() ],
            ];
    
            $departmentExists = DB::table('department')->whereIn('id', [1,2,3])->first();
            if (empty($departmentExists)) {
               DB::table('department')->insert($insertDepartmentArray);  
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
        Schema::dropIfExists('department');
    }
}
