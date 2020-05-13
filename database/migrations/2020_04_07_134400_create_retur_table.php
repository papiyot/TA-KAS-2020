<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatereturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->string('retur_id')->primary();
            $table->decimal('retur_jml', 15,2);
            $table->double('retur_harga',15);
            $table->string('retur_beli_id')->nullable();
            $table->foreign('retur_beli_id')->references('beli_id')->on('beli')->onUpdate('cascade')->onDelete('cascade');
            $table->string('retur_barang_id');
            $table->foreign('retur_barang_id')->references('barang_id')->on('barang')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('retur');
    }
}
