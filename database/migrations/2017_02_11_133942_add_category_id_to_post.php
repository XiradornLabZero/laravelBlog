<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // we use nullable because we have a empty category and for don't have problem we use this for say it was optional
            // unsigned is user for don't have negative numbers and an half memory usage for calculating things and stuff
            $table->integer('category_id')->nullable()->after('slug')->unsigned();

            // so now we use a releation whit a relation with a foreign keys
            // $table->foreign()->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
