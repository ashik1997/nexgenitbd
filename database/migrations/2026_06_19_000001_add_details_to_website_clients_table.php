<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToWebsiteClientsTable extends Migration
{
    public function up()
    {
        Schema::table('website_clients', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
            $table->string('industry')->nullable()->after('name');
            $table->text('description')->nullable()->after('industry');
            $table->unsignedInteger('sort_order')->default(0)->after('image');
            $table->boolean('is_active')->default(true)->after('sort_order');
        });
    }

    public function down()
    {
        Schema::table('website_clients', function (Blueprint $table) {
            $table->dropColumn(['name', 'industry', 'description', 'sort_order', 'is_active']);
        });
    }
}
