<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoFileUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_file_upload', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
        });

        Schema::table('todo_file_upload', function (Blueprint $table) {
            $table->unsignedBigInteger('todo_id');
            $table->unsignedBigInteger('file_upload_id');
        
            $table->foreign('todo_id')->references('id')->on('todos')->cascadeOnDelete();
            $table->foreign('file_upload_id')->references('id')->on('file_uploads')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_file_upload');
    }
}
