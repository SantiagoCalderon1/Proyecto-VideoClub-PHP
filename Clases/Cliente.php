<?php

class Cliente {
    public $nombre;
    private $numero;
    private $soportesAlquilados[];
    private $numSoportesAlquilados;
    private $maxAlquilerConcurrente;

    public funtion __construct($nombre, $numero, $soportesAlquilados, $numSoportesAlquilados, $maxAlquilerConcurrente = 3){
        $this->nombre=$nombre;
        $this->numero=$numero;
        $this->soportesAlquilados=$soportesAlquilados;
        $this->numSoportesAlquilados=$numSoportesAlquilados;
        $this->maxAlquilerConcurrente=$maxAlquilerConcurrente;
    }

    public function getNumero() {
        return  $this->numero;
    }

    public function setNumero($numero){
        return $this->numero=$numero;
    }

    public function getNumSoportesAlquilados(){
        return  $this->numSoportesAlquilados;
    }


    public function muestraResumen(){
        echo 'El cliente de nombre ' . $this->nombre . ' tiene un total de ' . $this->soportesAlquilados . ' alquileres.';
    }

    public function tieneAlquilado(Soporte $s) : bool{

        foreach ($this->$soportesAlquilados as $soporte) {
            if($soporte == $s){
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s) : bool{
        if($this->tieneAlquilado($s)==false && (numSoportesAlquilados<$maxAlquilerConcurrente)){
            $numSoportesAlquilados++;
            $soportesAlquilados.push($s);
            echo 'Se ha alquilado un juego';
        }
    }
}

?>