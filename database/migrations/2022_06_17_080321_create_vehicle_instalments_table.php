<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInstalmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_instalments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehicle_id');
            $table->double('instalment_price',8, 2);
            $table->double('instalment_overdue',8, 2)->nullable();
            $table->date('instalment_date');
            $table->string('instalment_month');
            $table->float('remaining_vehicle_installment',8, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
            $table->foreign('vehicle_id')
            ->references('id')
            ->on('vehicles')
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
        Schema::dropIfExists('vehicle_instalments');
    }
}
