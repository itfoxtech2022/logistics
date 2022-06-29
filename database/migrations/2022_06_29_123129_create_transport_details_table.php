<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transportation_id');
            $table->string('expense_brakup');
            $table->longText('description')->nullable();
            $table->float('amount');
            $table->softDeletes();
            $table->index(['created_at']);
            $table->timestamps();
            $table->foreign('transportation_id')
            ->references('id')
            ->on('transports')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_details');
    }
}
