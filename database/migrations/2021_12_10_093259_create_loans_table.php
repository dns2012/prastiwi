<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('member_id', 20);
            $table->string('loan_id', 50);
            $table->string('loan_type', 50);
            $table->dateTime('loan_at');
            $table->integer('loan_value');
            $table->integer('loan_interest');
            $table->integer('loan_value_paid');
            $table->integer('loan_interest_paid');
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
        Schema::dropIfExists('loans');
    }
}
