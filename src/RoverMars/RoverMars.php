<?php
/**

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
    public function __construct(MapaPlaneta $mapaPlaneta)
    {
        $this->posicion = new Posicion();
        $this->sistemaNavegacion = new SistemaNavegacion($mapaPlaneta, new ModuloOrientacionNorte($mapaPlaneta));
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

    public function estasEn(Posicion $posicion)
    {
        return $this->posicion->esIgual($posicion);
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
            RoverMars::GIRAR_DERECHA => [$this, 'girarSentidoHorario'],
            RoverMars::GIRAR_IZQUIERDA => [$this, 'girarSentidoAntihorario'],
        ];

        return call_user_func($acciones[$comando]);
    }

    private function girarSentidoHorario()
    {
        $this->sistemaNavegacion->girarSentidoHorario();
    }

    private function girarSentidoAntihorario()
    {
        $this->sistemaNavegacion->girarSentidoAntihorario();
    }

    private function avanzar()
    {
        $this->sistemaNavegacion->avanzar($this->posicion);
    }

    private function retroceder()
    {
        $this->sistemaNavegacion->retroceder($this->posicion);
    }
}