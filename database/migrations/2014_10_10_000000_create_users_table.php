<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            // $table->foreignId('client_id')->nullable()->constrained()->cascadeOnDelete();
            // $table->foreignId('employee_document_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('first_name', 200);
            $table->string('middle_name', 200)->nullable();
            $table->string('last_name', 200);
            $table->string('email')->unique();
            $table->string('line_manager')->nullable();
            $table->string('maxicare_card_number')->nullable();
            $table->string('maxicare_policy_number')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_status')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('status')->nullable();
            $table->string('role_name')->nullable();
            $table->string('avatar')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('link_to_skills',1500)->nullable();
            $table->timestamp('skills_last_modified_date')->nullable();
            $table->integer('skills_last_modified_by_id')->nullable();
            $table->text('notes')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            // ['client_id' => '1', 
            // 'employee_document_id' => '1', 
            ['first_name' => 'Tejane Jay', 
            'middle_name' => 'Sabion', 
            'last_name' => 'Dayon', 
            'email' => 'tjdayon.vdw@gmail.com', 
            'line_manager' => 'Chau Lim', 
            'maxicare_card_number' => 'dssdsdsd', 
            'maxicare_policy_number' => 'dsadsadas', 
            'job_title' => 'Web Developer', 
            'job_status' => 'Regular', 
            'phone_number' => '', 
            'status' => 'Active', 
            'role_name' => 'Admin', 
            'avatar' => 'photo_defaults.jpg', 
            'start_date' => '2023-01-09', 
            'end_date' => '2023-01-10', 
            'password' => '$2y$10$3KWn5MKLLaGKW4pa4rA8mus/kfq8p4Gy8MJKmct3XEES7YfpTBMv6',
            'notes' => 'Digital Marketing: 40 hrs per week'],
        ]);

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
