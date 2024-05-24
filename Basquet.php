<?php

include_once "Partido.php";

class Basquet extends Partido
{
    private $cantInfracciones;
    private $coefPenalizacion;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones)
    {

        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);

        $this->cantInfracciones = $cantInfracciones;
        $this->coefPenalizacion = 0.75;
    }

    public function getCantidadInfracciones(){
       return $this->cantInfracciones;
    }
    public function setCantidadInfracciones( $cantidadInfracciones){
        $this->cantInfracciones =  $cantidadInfracciones;
     }

    public function getCoeficientePenalizacion(){
        return $this->coefPenalizacion;
     }

     public function setCoeficientePenalizacion($coeficientePenalizacion){
         $this->coefPenalizacion = $coeficientePenalizacion;
     }

     public function coeficientePartido(){
        $coeficiente_base_partido = parent::coeficientePartido();

        $coef = $coeficiente_base_partido - ($this->getCoeficientePenalizacion() * $this->getCantidadInfracciones());

        return $coef;
     }


    public function __toString()
    {
        $cad = parent::__toString();
        $cad = $cad . "La cantidad de infracciones es: ".$this->getCantidadInfracciones().
        "\n"."El coeficiente de penalizacion es: ".$this->getCoeficientePenalizacion();
        return $cad;
    }
}