<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre")->default()->nullable();
            $table->string("foto")->default('default.png')->nullable();
            $table->string("codigo")->default()->nullable();
            $table->integer("cantidad")->default(0)->nullable();
            $table->double("costo",11,2)->default()->nullable();
            $table->double("precio",11,2)->default()->nullable();
            $table->string("descripcion")->default()->nullable();
            $table->unsignedBigInteger("categoria_id")->nullable();
            $table->foreign("categoria_id")->references("id")->on("categorias");

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
        Schema::dropIfExists('productos');
    }
};
