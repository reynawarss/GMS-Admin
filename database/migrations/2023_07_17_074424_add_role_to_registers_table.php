<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToRegistersTable extends Migration
{
    public function up()
    {
        Schema::table('registers', function (Blueprint $table) {
            $table->string('role')->nullable();
        });
    }

    public function down()
    {
        Schema::table('registers', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};