<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->date('tanggal_keluar')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->date('tanggal_keluar')->nullable(false)->change();
        });
    }
};
