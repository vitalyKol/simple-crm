<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('userscrm', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('userscrm', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
};
