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
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('extension')->nullable();
            $table->date('date_of_document')->nullable();
            $table->date('date_of_upload')->nullable();
            $table->integer('uploaded_by_id')->nullable();
            $table->integer('previous_document_id')->nullable();
            $table->integer('subsequent_document_id')->nullable();
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
