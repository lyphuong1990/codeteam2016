<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoanhNghiepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doanh_nghieps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mst');
            $table->string('ten_dn');
            $table->string('dia_chi');
            $table->string('dt_dn');
            $table->string('email');
            $table->string('n_daidien');
            $table->string('so_tien');
            $table->string('loai_goi');
            $table->string('so_nam');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('trang_thai');

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
        Schema::drop('doanh_nghieps');
    }
}
