<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('cnpj_cpf', 18)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email');
            $table->jsonb('address')->nullable();
            $table->jsonb('phones')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers', function(Blueprint $table) {
            $table->dropIndex('customers_deleted_at_index');
        });
    }
}
