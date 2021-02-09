<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTubesWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_bio', function (Blueprint $table) {
            $table->id();
            $table->string('need_to');
            $table->integer('numb_regis')->nullable();
            $table->integer('numb_poly')->nullable();
            $table->string('nik');
            $table->string('bpjs')->nullable();
            $table->string('med_rec')->nullable();
            $table->string('poly');
            $table->string('name');
            $table->date('birth');
            //$table->char('gender',1);
            $table->string('gender');
            $table->text('address');
            $table->bigInteger('phone');
            $table->string('status');
            $table->date('add_time');
            $table->timestamps();
        });
        /*Schema::create('pasien_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_bio_id')->unsigned();
            $table->timestamps();
            $table->foreign('pasien_bio_id')->references('id')->on('pasien_bio');
        });*/
        Schema::create('admin_bio', function (Blueprint $table) {
            $table->id();
            $table->integer('nip');
            $table->string('staff_name');
            $table->string('sector');
            $table->timestamps();
        });
        Schema::create('panggil_pasien', function (Blueprint $table) {
            $table->id();
            $table->integer('number_call');
            $table->integer('number_call_poly');
            $table->string('poly');
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
        Schema::dropIfExists('pasien_bio');
        Schema::dropIfExists('admin_bio');
        Schema::dropIfExists('number_call');
        //Schema::dropIfExists('pasien_data');
        
    }
}
