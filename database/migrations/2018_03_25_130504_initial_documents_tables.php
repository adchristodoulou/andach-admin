<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialDocumentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('url');
            $table->string('extension');
            $table->date('date_of_document');
            $table->date('date_of_upload');
            $table->integer('uploaded_by_id');
            $table->timestamps();
        });

        Schema::create('documenteds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id');
            $table->integer('documented_id');
            $table->string('documented_type');
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
        Schema::dropIfExists('documents');
        Schema::dropIfExists('documented');
    }
}
