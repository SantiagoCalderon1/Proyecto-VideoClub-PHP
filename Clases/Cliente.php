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
        echo '<br>El cliente de nombre ' . $this->nombre . ' tiene un total de ' . count($this->soportesAlquilados) . ' alquileres.<br>';
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

        if ($this->tieneAlquilado($s) == false){
            if($this->numSoportesAlquilados < $this->maxAlquilerConcurrente){
                $this->numSoportesAlquilados++;
                array_push($this->soportesAlquilados, $s);
                echo "<br> Alquilado soporte a: $this->nombre <br>";
                $s->muestraResumen();
                return true;
            }else{
                echo '<br> Este cliente tiene 3 elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br> ';   
            }
        } else {
            echo "<br> El cliente ya tiene alquilado el soporte $s->titulo <br>";
        }
        return false;
    }

    public function devolver(int $numSoporte): bool
    {
        if(count($this->soportesAlquilados)!=0){
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
                echo '<br> Se ha completado la devolucion<br> ';
                return true;
            } else {
                echo '<br> No se ha podido encontrar el soporte en los alquileres de este cliente<br> ';
            }
        }else{
            echo "<br>Este cliente no tiene alquilado ningún elemento<br>";
        }
        return false;
    }

    //Informa de cuantos alquileres tiene el cliente y los muestra.
    public function listarAlquileres()
    {
        echo "<br><strong>El cliente tiene $this->numSoportesAlquilados alquileres</strong><br>";

        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
        }
    }
}
