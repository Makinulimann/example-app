<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->string('nama');
            $table->integer('age');
            $table->string('phone');
            $table->integer('height');
            $table->integer('weight');
            $table->string('rumah_sakit');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkups');
    }
}
