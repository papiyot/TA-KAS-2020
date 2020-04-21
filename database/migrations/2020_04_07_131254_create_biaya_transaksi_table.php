<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_transaksi', function (Blueprint $table) {
            $table->string('biaya_transaksi_id')->primary();
            $table->date('biaya_transaksi_tgl');
            $table->double('biaya_transaksi_jml',15);
            $table->string('biaya_transaksi_biaya_id')->nullable();
            $table->foreign('biaya_transaksi_biaya_id')->references('biaya_id')->on('biaya')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_transaksi');
    }
}
