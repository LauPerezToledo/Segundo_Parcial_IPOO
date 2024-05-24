<?php
class Torneo
{
    private $colPartidos;
    private $importe;

	public function __construct($colPartidos) {

		$this->colPartidos = $colPartidos;
	}

	public function getColPartidos() {
		return $this->colPartidos;
	}

	public function setColPartidos($value) {
		$this->colPartidos = $value;
	}

    public function getImporte() {
		return $this->importe;
	}

	public function setImporte($value) {
		$this->importe = $value;
	}

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $objCat1 = $OBJEquipo1->getObjCategoria();
        $objCat2 = $OBJEquipo2->getObjCategoria();
        $cantJugEqu1 = $OBJEquipo1->getCantJugadores();
        $cantJugEqu2 = $OBJEquipo1->getCantJugadores();
        if ($objCat1->getidCategoria() == $objCat2->getidcategoria() &&
        $cantJugEqu1 == $cantJugEqu2){
            $n = count($this->getColPartidos()) + 1;
            $partido = new Partido($n,$fecha,$OBJEquipo1,0, $OBJEquipo2, 0);
            array_push($this->getColPartidos(), $partido);
            $this->setColPartidos($this->getColPartidos());
        }
        return $partido;
    } 

   /* Implementar el método darGanadores($deporte) 
    en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol 
    o de básquetbol y en  base  al parámetro busca entre esos partidos los equipos ganadores 
    ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los 
    equipos encontrados.*/

    public function darGanadores($deporte){
        $colGanadores = [];
        $partidos = $this->getColPartidos();
        foreach ($partidos as $partido) {
            if ($deporte instanceof Futbol){
                $equipoGana = $partido->darEquipoGanador();
                array_push($colGanadores, $equipoGana);
            }
            if ($deporte instanceof Basquet){
                $equipoGana = $partido->darEquipoGanador();
                array_push($colGanadores, $equipoGana);
            }
            
        }   
        return $colGanadores;
    }

    /*Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
     donde una de sus claves es ‘equipoGanador’  y contiene la referencia al equipo ganador; y la otra clave 
     es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe 
     configurado para el torneo. 
     (premioPartido = Coef_partido * ImportePremio)*/

     public function calcularPremioPartido($OBJPartido){
        $equipoGana = $OBJPartido->darEquipoGanador();
        $premio = $OBJPartido->coeficientePartido() * $this->getImporte();
        $arreglo = ['equipoGanador'=>$equipoGana, 'premioPartido' =>$premio];
        return $arreglo;
     }

     public function __toString(){
        $partidos = $this->getColPartidos();
        $cad = "";
        foreach ($partidos as $partido) {
        }
     }
}