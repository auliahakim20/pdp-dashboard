<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengukuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengukuran', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('tds', 8, 2);
            $table->decimal('turbidity', 8, 2);
            $table->decimal('temperature', 6, 2);
            $table->tinyInteger('kualitas')->comment('0=Buruk, 1=Baik');
            $table->dateTime('tanggal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengukuran');
    }
}
