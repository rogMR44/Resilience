<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('cuello')->default('no registrado')->nullable();
            $table->string('pecho')->default('no registrado')->nullable();
            $table->string('hombro')->default('no registrado')->nullable();
            $table->string('bicep_derecho_r')->default('no registrado')->nullable();
            $table->string('bicep_izquierdo_r')->default('no registrado')->nullable();
            $table->string('bicep_derecho_c')->default('no registrado')->nullable();
            $table->string('bicep_izquierdo_c')->default('no registrado')->nullable();
            $table->string('antebrazo_derecho')->default('no registrado')->nullable();
            $table->string('antebrazo_izquierdo')->default('no registrado')->nullable();
            $table->string('muneca_derecha')->default('no registrado')->nullable();
            $table->string('muneca_izquierda')->default('no registrado')->nullable();
            $table->string('cintura')->default('no registrado')->nullable();
            $table->string('gluteo')->default('no registrado')->nullable();
            $table->string('muslo_derecho')->default('no registrado')->nullable();
            $table->string('muslo_izquierdo')->default('no registrado')->nullable();
            $table->string('pantorilla_derecha')->default('no registrado')->nullable();
            $table->string('pantorilla_izquierda')->default('no registrado')->nullable();
            $table->string('peso')->default('no registrado')->nullable();
            $table->string('estatura')->default('no registrado')->nullable();
            $table->date('date_recorded');
            
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('measurements');
    }
}
