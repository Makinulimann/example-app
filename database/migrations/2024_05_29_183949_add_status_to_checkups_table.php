<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToCheckupsTable extends Migration
{
    public function up()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->string('status')->default('pending');
        });
    }

    public function down()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
