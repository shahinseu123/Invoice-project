<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('customer');
            $table->bigInteger('customerPhone')->nullable();
            $table->text('customerEmail')->nullable();
            $table->longText('shipTo');
            $table->date('quotationDate');
            $table->string('quotationNumber');
            $table->string('paymentMethod');
            $table->string('currency');
            $table->integer('shippingCost');
            $table->float('subtotal', 12, 2);
            $table->float('total', 12, 2);
            $table->text('priceInWord');
            $table->string('authorisedBy');
            $table->date('delivaryDate');
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
        Schema::dropIfExists('invoices');
    }
}
