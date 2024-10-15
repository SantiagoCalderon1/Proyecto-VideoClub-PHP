<?php
include_once "Soporte.php";

class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados;
    private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $mAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->numSoportesAlquilados = 0;
        $this->maxAlquilerConcurrente = $mAlquilerConcurrente;
    }

    public function getNumero()
    {
        return  $this->numero;
    }

    public function setNumero($numero)
    {
        return $this->numero = $numero;
    }

    public function getNumSoportesAlquilados()
    {
        return  $this->numSoportesAlquilados;
    }


    public function muestraResumen()
    {
        echo 'El cliente de nombre ' . $this->nombre . ' tiene un total de ' . $this->soportesAlquilados . ' alquileres.';
    }

    public function tieneAlquilado(Soporte $s): bool
    {

        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte == $s) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): bool
    {

        if($this->numSoportesAlquilados < $this->maxAlquilerConcurrente){
            if ($this->tieneAlquilado($s) == false){
                $this->numSoportesAlquilados++;
                array_push($this->soportesAlquilados, $s);
                echo "<br> Alquilado soporte a: $this->nombre <br>";
                $s->muestraResumen();
                return true;
            } else {
                echo "<br> El cliente ya tiene alquilado el soporte $s->titulo <br>";
                return false;
            }
        }else{
            echo 'Este cliente tiene 3 elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo';
        }
    }

    public function devolver(int $numSoporte): bool
    {
        $encontrado = false;
        // Debe comprobar que el soporte estaba alquilado
        foreach ($this->soportesAlquilados as $clave=>$soporte) {
            if ($soporte instanceof Soporte) {
                if ($soporte->getNumero() == $numSoporte) {
                    $encontrado = true;
                    unset($this->soportesAlquilados[$clave]); //borrar del array
                }
            }
        }
        //actualizar la cantidad de soportes alquilados.
        if ($encontrado) {
            $this->numSoportesAlquilados--;
            echo 'Se ha completado la devolucion';
            return true;
        } else {
            echo 'No esta alquilado';
            return false;
        }
    }

    //Informa de cuantos alquileres tiene el cliente y los muestra.
    public function listarAlquileres()
    {
        echo "El cliente tiene $this->numSoportesAlquilados alquileres";

        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
        }
    }
}
