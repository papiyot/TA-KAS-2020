<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebeliDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_detail', function (Blueprint $table) {
            $table->string('beli_detail_id')->primary();
            $table->decimal('beli_detail_jml', 15,2);
            $table->double('beli_detail_harga',15);
            $table->string('beli_id')->nullable();
            $table->foreign('beli_id')->references('beli_id')->on('beli')->onUpdate('cascade')->onDelete('cascade');
            $table->string('barang_id');
            $table->foreign('barang_id')->references('barang_id')->on('barang')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('beli_detail');
    }
}
