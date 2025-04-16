<?php
class Aerolineas{
    private $identificacion;
    private $nombre;
    private $colVuelosProgramados;

    //Metodo Constructor 
    public function __construct($identificacion,$nombre)
    {
        $this->identificacion=$identificacion;
        $this->nombre=$nombre;
        $this->colVuelosProgramados=[];
    }

    public function darVueloADestino($destino,$cant_asientos){
        $coleccionVuelos = $this->getColVuelosProgramados();
        $coleccionAerolinea = [];
        foreach($coleccionVuelos as $objVuelo){
            $destino2 = $objVuelo->getDestino();
            $cantidadDisponible = $this->getAsientosDisponibles();
            if($destino2 == $destino && $cantidadDisponible <= $cant_asientos){
                array_push($coleccionAerolinea, $objVuelo);
            }
        }
        return $coleccionAerolinea;
    }


    public function incorporarVuelo($vueloAIncorporar){
        $coleccionVuelos = $this->getColVuelosProgramados();
        foreach($coleccionVuelos as $objVuelo){
            if($objVuelo->getDestino()==$vueloAIncorporar->getDestino() && $objVuelo->getFecha()==$vueloAIncorporar->getFecha() && $objVuelo->getHoraPartida() == $vueloAIncorporar->getHoraPartida()){
                $valorARetornar = false;
            }else{
                array_push($coleccionVuelos,$vueloAIncorporar);
                $valorARetornar = true;
            }
        }
        return $valorARetornar;
    }

    public function venderVueloAdestino($cant_asientos,$destino,$fecha){
        $encontrado = false;
        $vueloEncontrado = null;
        $i = 0;
        $coleccionVuelos = $this->getColVuelosProgramados();
        $contadorVuelos = count($coleccionVuelos);
        while(!$encontrado && $i >=$contadorVuelos){
            if($coleccionVuelos->getDestino()==$destino && $coleccionVuelos->getAsientosTotales()==$cant_asientos && $coleccionVuelos->getFecha()==$fecha){
                $encontrado = true;
                $vueloEncontrado = $coleccionVuelos[$i];
            }
            $i++;
        }
        return $vueloEncontrado;
    }
}