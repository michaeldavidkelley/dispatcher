<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetryFieldsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('listeners_first_delay')->after('enabled');
            $table->unsignedInteger('listeners_max_retries')->after('enabled');
            $table->unsignedInteger('listeners_retry_delay')->after('enabled');
            $table->boolean('listeners_can_override')->default(false)->after('enabled');
            $table->boolean('listeners_require_confirmation')->default(true)->after('enabled');
            $table->string('listeners_confirmation_code')->nullable()->after('enabled');
        });
    }
}
