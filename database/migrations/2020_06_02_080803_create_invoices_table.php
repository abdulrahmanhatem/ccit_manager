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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('invoice_no');
            $table->integer('user_id');
            $table->string('date')->nullable();
            $table->string('due_date')->nullable();
            $table->integer('sub_total')->default(0);
            $table->integer('grand_total')->default(0);
            $table->integer('vat_amount')->default(0);
            $table->decimal('vat', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->integer('discount_amount')->default(0);
            $table->string('service_1');
            $table->string('service_2')->nullable();
            $table->string('service_3')->nullable();
            $table->string('service_4')->nullable();
            $table->string('service_5')->nullable();
            $table->integer('service_1_price')->default(0);
            $table->integer('service_2_price')->nullable();
            $table->integer('service_3_price')->nullable();
            $table->integer('service_4_price')->nullable();
            $table->integer('service_5_price')->nullable();
            $table->integer('qty_1')->default(1);
            $table->integer('qty_2')->nullable();
            $table->integer('qty_3')->nullable();
            $table->integer('qty_4')->nullable();
            $table->integer('qty_5')->nullable();
            $table->string('docs')->nullable();
            $table->string('des')->nullable();
            $table->integer('status')->default(0);
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
