<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('refNo')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->dateTime('borrowDate');
            $table->dateTime('returnDate');
            $table->timestamps();
            //set the properties of user_id foreign key
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            //set properties of status_id foreign key
            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            //set properties of asset_id foreign key
            $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            //set properties of category_id foreign key
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
