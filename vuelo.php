<?php
class Vuelo{
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $asientosTotales;
    private $asientosDisponibles;
    private $refPersona;


    public function asignarAsientosDisponibles($cant_pasajeros){
        $respuesta = false;
        $cantidadAsientos = $this->getAsientosDisponibles();
        if($cant_pasajeros <= $cantidadAsientos){
            $respuesta = true;
            $cantidadNueva = $this->getAsientosDisponibles() - $cant_pasajeros;
            $this->setAsientosDisponibles($cantidadNueva);
        }
        return $respuesta;
    }
}