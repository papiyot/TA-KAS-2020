<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatejualDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual_detail', function (Blueprint $table) {
            $table->string('jual_detail_id')->primary();
            $table->decimal('jual_detail_jml', 15,2);
            $table->double('jual_detail_harga',15);
            $table->string('jual_id')->nullable();
            $table->foreign('jual_id')->references('jual_id')->on('jual')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jual_detail');
    }
}
