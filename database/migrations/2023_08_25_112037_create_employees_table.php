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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nip');
            $table->string('full_name');
            $table->date('birth_day');
            $table->string('gender');
            $table->text('address');
            $table->string('mobilephone');
            $table->string('email')->unique();
            $table->date('date_of_entry');
            $table->foreignUuid('job_title_id')
                    ->constrained('job_titles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignUuid('department_id')
                    ->constrained('departments')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
};
