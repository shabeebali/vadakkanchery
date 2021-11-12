<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob')->nullable();
            $table->date('dod')->nullable();
            $table->string('blood_group')->nullable();
            $table->text('address')->nullable();
            $table->text('temporary_address')->nullable();
            $table->boolean('employed');
            $table->json('phones')->nullable();
            $table->string('max_qualification');
            $table->boolean('married');
            $table->integer('parent_id')->nullable();
            $table->integer('spouse_id')->nullable();
            $table->boolean('in_law');
            $table->boolean('male');
            $table->string('aadhar')->nullable();
            $table->string('email')->nullable();
            $table->boolean('alive');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('occupation')->nullable();
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
        Schema::dropIfExists('members');
    }
}
