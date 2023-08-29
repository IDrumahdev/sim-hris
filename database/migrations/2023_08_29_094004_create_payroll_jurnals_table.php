<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_jurnals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('payroll_id')
                    ->constrained('payrolls')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignUuid('period_payroll_id')
                    ->constrained('period_payrolls')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->date('date_payrol');
            $table->integer('take_home_pay');
            $table->text('description');
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
        Schema::dropIfExists('payroll_jurnals');
    }
};
