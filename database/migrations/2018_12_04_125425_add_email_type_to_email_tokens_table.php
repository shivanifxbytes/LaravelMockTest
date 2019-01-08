<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailTypeToEmailTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_tokens', function (Blueprint $table) {
             $table->tinyInteger('email_type')->nullable()->comment('Email Types : 1 for Verify Users , 2 for Password Resets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_tokens', function (Blueprint $table) {
             $column->dropColumn('email_type');
        });
    }
}
