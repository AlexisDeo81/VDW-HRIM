<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email_address')->unique();
            $table->string('skype')->nullable();
            $table->string('company_name')->nullable();
            $table->text('job_description')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        DB::table('clients')->insert([
            ['fname' => 'Chau', 
            'lname' => 'Lim', 
            'email_address' => 'clim@logisticsbureau.com', 
            'skype' => 'clim_LB', 
            'company_name' => 'Logistics Bureau',
            'job_description' => 'Digital Marketing', 
            'status' => 'Active', 
            'start_date' => '2023-01-09', 
            'created_at' => '2023-01-09', 
            'updated_at' => '2023-01-09',
            'notes' => '8hrs pr month'], 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
