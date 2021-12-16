<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvgPurchasePriceToPurchaseLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_lines', function (Blueprint $table) {
            $table->decimal('avg_purchase_price', 22, 4)->default(0)->after('purchase_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_lines', function (Blueprint $table) {
            //
        });
    }
}
