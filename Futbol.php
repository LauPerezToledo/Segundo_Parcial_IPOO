<?php

include_once "Partido.php";

class Futbol extends Partido{
    private $coef_Menores;
    private $coef_juveniles;
    private $coef_Mayores;
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefBase){

        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);

        $this->coef_Menores = 0.13;
        $this->coef_juveniles = 0.19;
        $this->coef_juveniles = 0.27;
    }

	public function getCoef_Menores() {
		return $this->coef_Menores;
	}

	public function setCoef_Menores($coef_Menores) {
		$this->coef_Menores = $coef_Menores;
	}

	public function getCoef_juveniles() {
		return $this->coef_juveniles;
	}

	public function setCoef_juveniles($coef_juveniles) {
		$this->coef_juveniles = $coef_juveniles;
	}

	public function getCoef_Mayores() {
		return $this->coef_Mayores;
	}

	public function setCoef_Mayores($coef_Mayores) {
		$this->coef_Mayores = $coef_Mayores;
	}

    public function obtenerCoeficientePorCategoria($categoria){
    
        if ($categoria == 'Menores') {
                $coef = $this->getCoef_Menores();
        }elseif($categoria =='juveniles'){
                $coef = $this->getCoef_juveniles();
    
        }elseif($categoria =='Mayores'){
                $coef = $this->getCoef_Mayores();

        }
      return $coef;
    }
    public function coeficientePartido() {
        $coef1 = $this->obtenerCoeficientePorCategoria($this->getObjEquipo1()->getObjCategoria()->getDescripcion());
        $coef2 = $this->obtenerCoeficientePorCategoria($this->getObjEquipo2()->getObjCategoria()->getDescripcion());
        
        $coefEquipo1 = $coef1 * $this->getCantGolesE1() * $this->getObjEquipo1()->getCantJugadores();
        $coefEquipo2 = $coef2 * $this->getCantGolesE2() * $this->getObjEquipo2()->getCantJugadores();
        $coefTotal = $coefEquipo1 + $coefEquipo2;
        return $coefTotal;
    }
    public function __toString(){
        $cad = parent::__toString();
        $cad = $cad . "Coeficiente Menor".$this->getCoef_Menores(). 
        "\n". "coeficiente juvenil".$this->getCoef_juveniles().
        "\n"."Coeficiente mayores:".$this->getCoef_Mayores();
        return $cad;
    }
}