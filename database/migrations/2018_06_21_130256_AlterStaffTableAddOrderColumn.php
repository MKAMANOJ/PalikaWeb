<?php

use App\EBP\Constants\DBTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AlterStaffTableAddOrderColumn
 */
class AlterStaffTableAddOrderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(DBTable::STAFF, function (Blueprint $table) {
            $table->integer('order')->after('name')->default(1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(DBTable::STAFF, function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
