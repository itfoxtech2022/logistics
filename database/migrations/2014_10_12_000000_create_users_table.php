<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile')->nullable();
            $table->enum('user_role',[1,2])->comment('1=superadmin,2=subadmin');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->enum('role_status',['0','1'])->comment('0 = deactive,1 = active')->default(0);
            $table->string('token')->nullable();
            $table->rememberToken();
            $table->timestamp('last_sign_in_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
