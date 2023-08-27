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
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('employee_id')
                    ->constrained('employees')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->date('date_attendance');
            $table->time('check_in');
            $table->time('check_out');
            $table->string('description')->default('default Attendance WFO');
            $table->string('status_attendance')->default('WFO');
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
        Schema::dropIfExists('attendances');
    }
};
