<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListenersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('listeners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->string('name');
            $table->text('description');
            $table->boolean('enabled');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['event_id', 'name']);
        });
    }
}
