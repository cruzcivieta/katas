<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 28/11/15
 * Time: 19:47
 */

namespace RoverMars;


class RoverMars
{
    const ORIGIN = [0,0];
    const AVANZAR = 'f';
    const RETROCEDER = 'b';
    const GIRAR_IZQUIERDA = 'l';
    const GIRAR_DERECHA = 'r';

    private $posicion;
    private $sistemaNavegacion;

    /**
     * RoverMars constructor.
     */
    public function __construct()
    {
        $this->posicion = RoverMars::ORIGIN;
        $this->sistemaNavegacion = new SistemaNavegacion();
    }

    public function ejecutar($comandos)
    {
        foreach ($comandos as $comando) {
            $this->lanzar($comando);
        }
    }

    public function dondeEstas()
    {
        return $this->posicion;
    }

    public function haciaDondeNosDirigimos()
    {
        return $this->sistemaNavegacion->haciaDondeNosDirigimos();
    }

    private function lanzar($comando)
    {
        $acciones = [
            RoverMars::AVANZAR => [$this, 'avanzar'],
            RoverMars::RETROCEDER => [$this, 'retroceder'],
            RoverMars::GIRAR_DERECHA => [$this, 'girarDerecha'],
            RoverMars::GIRAR_IZQUIERDA => [$this, 'girarIzquierda'],
        ];

        call_user_func($acciones[$comando]);
    }

    private function girarDerecha()
    {
        $this->sistemaNavegacion->girarDerecha();
    }

    private function girarIzquierda()
    {
        $this->sistemaNavegacion->girarIzquierda();
    }

    private function avanzar()
    {
        $this->sistemaNavegacion->avanzar($this->posicion);
    }

    private function retroceder()
    {
        if ($this->sistemaNavegacion->haciaDondeNosDirigimos() === 'Este') {
            $this->posicion[0] -= 1;
        } else {
            $this->posicion[1] -= 1;
        }
    }
}