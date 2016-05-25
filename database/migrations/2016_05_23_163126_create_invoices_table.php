<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('landlord_id');
            //$table->foreign('landlord_id')->references('id')->on('users');
            $table->bigInteger('tenant_id');
            //$table->foreign('tenant_id')->references('id')->on('users');
            $table->text('line_items');
            $table->text('line_costs');
            $table->string('taxable');
            $table->float('tax_percentage');
            $table->string('status');
            $table->dateTime('paid_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
