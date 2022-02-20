<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            /* the courses has select category,name,description,rating integer,views as integer, 
             levels as enum(beginner,immediat,high),hours as integer, active to hide or 
             show the course on the website */
            $table->id();
            $table->char('name', 250);
            $table->text('description')->nullable();
            $table->bigInteger('views_count')->unsigned();
            $table->integer('levels');
            $table->integer('hours')->unsigned();
            $table->boolean('active');
            $table->softDeletes();

            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
