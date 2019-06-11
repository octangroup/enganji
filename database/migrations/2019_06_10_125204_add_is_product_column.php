<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsProductColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('condition_id')->nullable()->change();
            $table->float('quantity')->nullable()->change();
            $table->float('price')->nullable()->change();
            $table->unsignedInteger('currency_id')->nullable()->change();
            $table->boolean('is_service')->default(false)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('condition_id')->change();
            $table->float('quantity')->change();
            $table->float('price')->change();
            $table->unsignedInteger('currency_id')->change();
            $table->dropColumn('is_service');
        });
    }
}
