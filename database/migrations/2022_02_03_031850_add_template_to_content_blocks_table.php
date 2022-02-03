<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplateToContentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content_blocks', function (Blueprint $table) {
            $table->foreignId('template_id')->after('page_id');
            $table->longText('template_vars')->after('template_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_blocks', function (Blueprint $table) {
            $table->dropColumn(['template_id', 'template_vars']);
        });
    }
}
