<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // we try to add a NEW column to the database and this is the first step
        Schema::table('posts', function($table) {
            $table->string('slug')->unique()->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // the only thing to reverse is the column creation
        Schema::table('posts', function($table) {
            $table->dropColumn('slug');
        });
    }
}
