<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('voucher_number');
            $table->string('voucher_type');
            $table->string('exp_start_date');
            $table->string('exp_end_date');
            $table->integer('vehicle_id');
            $table->string('dreiver_name');
            $table->string('code');
            $table->string('trip_type');
            $table->date('trip_start_date');
            $table->string('client_name');
            $table->string('route_name'); 
            $table->string('route_distance');
            $table->float('extimate_budget_fuel_qty');
            $table->string('bank_name');
            $table->bigInteger('ac_number');
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->string('remark')->nullable();
            $table->softDeletes();
            $table->index(['created_at']);
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
        Schema::dropIfExists('transports');
    }
}
