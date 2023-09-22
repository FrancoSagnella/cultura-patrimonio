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
        //Crea todas las tablas de 'tipos'
        /*Schema::create('tipos_asignacion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
        /*Schema::create('tipos_baja', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
        Schema::create('tipos_bien', function (Blueprint $table) {
            //columnas
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->integer('codigo_presup');
            $table->string('tipo_bien', 255);
            $table->string('descripcion_bien', 255);
            $table->tinyInteger('borrado');
            $table->timestamps();

            //claves
            $table->foreign('parent_id')->references('id')->on('tipos_bien');
        });
        /*Schema::create('tipos_bien_amortizacion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
        Schema::create('tipos_ingreso', function (Blueprint $table) {
            //columnas
            $table->id();
            $table->string('ingreso', 255);
            $table->timestamps();
        });
        /*Schema::create('tipos_remito', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
        /*Schema::create('tipos_responsable', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/

        //Crea todas las tablas de entidades (necesarias para patrimonio)
        Schema::create('universos', function (Blueprint $table) {
            $table->id();
            $table->string('universo', 255);
            $table->timestamps();
        });
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_provincia', 255);
            $table->string('inicial_provincia', 255);
            $table->timestamps();
        });
        Schema::create('direcciones', function (Blueprint $table) {
            //columnas
            $table->id();
            $table->string('calle', 255);
            $table->string('numero', 255);
            $table->string('piso', 255);
            $table->string('departamento', 255);
            $table->string('codigo_postal', 255);
            $table->string('localidad', 255);
            $table->string('telefono', 255);
            $table->unsignedBigInteger('provincia_id');
            $table->timestamps();

            //claves
            $table->foreign('provincia_id')->references('id')->on('provincias');
        });
        Schema::create('dependencias', function (Blueprint $table) {
            //columnas
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('nombre_dependencia', 255);
            $table->unsignedBigInteger('direccion_id');
            $table->tinyInteger('borrado');
            $table->timestamps();

            //claves
            $table->foreign('parent_id')->references('id')->on('dependencias');
            $table->foreign('direccion_id')->references('id')->on('direcciones');
        });
        Schema::create('proveedores', function (Blueprint $table) {
            //Columnas
            $table->id();
            $table->string('nombre_proveedor', 255);
            $table->string('descripcion_proveedor', 255);
            $table->unsignedBigInteger('direccion_id');
            $table->tinyInteger('borrado');
            $table->timestamps();

            //Claves
            $table->foreign('direccion_id')->references('id')->on('direcciones');
        });
        Schema::create('entidades_externas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->timestamps();
        });
        Schema::create('patrimonios_baja', function (Blueprint $table) {
            //Columnas
            $table->id();
            $table->integer('tipo_baja_id');
            $table->integer('numero_tipo_baja');
            $table->date('anio_tipo_baja');
            $table->string('motivo_baja', 252);
            $table->unsignedBigInteger('entidad_externa_id');
            $table->tinyInteger('borrado');
            $table->timestamps();

            //claves
            $table->foreign('entidad_externa_id')->references('id')->on('entidades_externas');
        });
        Schema::create('patrimonios', function (Blueprint $table) {
            //columnas
            $table->id();
            $table->smallInteger('saf');
            $table->integer('nro_inventario');
            $table->unsignedBigInteger('dependencia_id');
            $table->unsignedBigInteger('tipo_bien_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('tipo_ingreso_id');
            $table->unsignedBigInteger('universo_id');
            $table->string('orden_compra', 252);
            $table->datetime('fecha_orden');
            $table->string('nro_expediente', 100);
            $table->string('nro_factura', 100);
            $table->datetime('fecha_factura');
            $table->double('importe');
            $table->string('nro_serie', 252);
            $table->string('descripcion_patrimonio', 252);
            $table->unsignedBigInteger('baja_id');
            $table->tinyInteger('borrado');
            $table->timestamps();

            //claves
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->foreign('tipo_bien_id')->references('id')->on('tipos_bien');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('tipo_ingreso_id')->references('id')->on('tipos_ingreso');
            $table->foreign('universo_id')->references('id')->on('universos');
            $table->foreign('baja_id')->references('id')->on('patrimonios_baja');
        });

        //Crea tablas de entidades (que no estan relacionadas con patrimonio a priori)
        /*
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('remitos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('estados_relevamiento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('estados_transferencia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('historicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('remito_patrimonio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('transferencia_patrimonio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
