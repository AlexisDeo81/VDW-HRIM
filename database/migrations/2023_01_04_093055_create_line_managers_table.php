<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_managers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('line_managers')->insert([
            ['name' => 'Joel Rey Bueno'],
            ['name' => 'Leo Angelo Lisondra'],
            ['name' => 'Evelyn Obenza'],
            ['name' => 'Joshua Asuela Jr.'],
            ['name' => 'Chau Lim'],
            ['name' => 'Rob O`Byrne'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_managers');
    }
}
