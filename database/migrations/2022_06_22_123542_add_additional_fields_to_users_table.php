<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable();
            $table->string('idNumber')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('language')->nullable();
            $table->text('interests')->nullable();
            $table->string('role')->default('normalUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('idNumber');
            $table->dropColumn('mobileNumber');
            $table->dropColumn('birthDate');
            $table->dropColumn('language');
            $table->dropColumn('interests');
            $table->dropColumn('role');
        });
    }
}
