<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->char('logo', 250);
            $table->char('name', 250);
            $table->char('email', 250);
            $table->unsignedInteger('ein');
            $table->unsignedInteger('phone');
            $table->text('principal_address');
            $table->char('responsable_name',250);
            $table->char('responsable_lastname',250);
            $table->unsignedInteger('responsable_phone');
            $table->text('responsable_address');
            $table->text('notes');
            $table->unsignedInteger('status');

            $table->unsignedBigInteger('services_packs_id');
            $table->foreign('services_packs_id')->references('id')->on('services_packs');

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
        Schema::dropIfExists('empresas');
    }
}
