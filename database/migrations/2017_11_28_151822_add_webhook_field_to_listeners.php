<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWebhookFieldToListeners extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('listeners', function (Blueprint $table) {
            $table->string('webhook')->nullable()->after('enabled');
        });
    }
}
