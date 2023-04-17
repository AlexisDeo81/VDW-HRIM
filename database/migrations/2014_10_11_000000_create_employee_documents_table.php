<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->string('name');
            $table->string('extension');
            $table->tinyInteger('show_to_employee');
            $table->integer('uploaded_by');
            $table->string('type');
            $table->timestamps();
        });


        DB::table('employee_documents')->insert([
            ['user_id' => '1', 
            'path' => '1674609918.pdf', 
            'name' => 'Test',
            'extension' => 'pdf',
            'show_to_employee' => '0',
            'uploaded_by' => '1',
            'type' => 'Memo',], 
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_documents');
    }
}
