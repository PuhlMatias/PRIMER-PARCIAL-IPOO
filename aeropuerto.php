<?php
class Aeropuerto{
    private $denominacion;
    private $direccion;
    private $colAerolineas;


    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColAerolineas(){
        return $this->colAerolineas;
    }

    public function setDenominacion($denominacion){
        $this->denominacion=$denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setColAerolineas($colAerolineas){
        $this->colAerolineas=$colAerolineas;
    }

    public function __toString()
    {
        $aerolineas = "";
        foreach($this->getColAerolineas() as $aereo){
            $aerolineas .= $aereo . "\n";
        }
        return "Denominacion: " . $this->getDenominacion(). "\n".
        "Direccion: " . $this->getDireccion(). "\n".
        "Aerolineas arribadas: " . $aerolineas. "\n";
    }


    public function retornarVuelosAerolineas($aerolineas){
        $vuelosEncontrados = [];
        foreach($aerolineas as $aerolinea){
            foreach($aerolinea->getColVuelosProgramados() as $vuelo){
                $vuelosEncontrados[] = $vuelo;
            }
        }
        return $vuelosEncontrados;
    }


    public function ventaAutomatica($cantPasajeros, $fecha, $destino) {
        $venta = false;
        foreach ($this->getColAerolineas() as $vuelo) {
            if (!$venta && $vuelo->getDestino() == $destino && $vuelo->getFecha() == $fecha) {
                $venta = $vuelo->asignarAsientosDisponibles($cantPasajeros);
            }
        }
        return $venta;
    }

    public function promedioRecaudadoXAerolinea($identificacion){
        $recaudado = 0;
        $contadorVuelos = 0;
        foreach($identificacion as $vuelos){
            $coleccionDeVuelos = $vuelos->getColVuelosProgramados();
            foreach($coleccionDeVuelos as $vuelo){
                $recaudado += $vuelo->getImporte(); 
                $contadorVuelos++; 
            }
        }
        if ($contadorVuelos > 0) {
            $promedio = $recaudado / $contadorVuelos;
        }else{
            $promedio = 0;
        }
        return $promedio;
    }

}