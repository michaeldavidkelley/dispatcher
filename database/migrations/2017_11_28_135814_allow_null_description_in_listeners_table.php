<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullDescriptionInListenersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('listeners', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
    }
}
