<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->string('number');
            $table->string('productName');
            $table->longText('details');
            $table->integer('quantity');
            $table->integer('storeDisabledProduct')->nullable();
            $table->boolean('disableProduct')->default(false);
            $table->float('price', 12, 2);
            $table->float('lineTotal',12, 2);
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
        Schema::dropIfExists('invoice_products');
    }
}
