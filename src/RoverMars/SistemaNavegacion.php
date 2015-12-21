<?php
/**
 * User: dcruz
 * Date: 29/11/15
 * Time: 19:49
 */

namespace RoverMars;


class SistemaNavegacion implements ModuloOrientacion
{
    const NORTE = 'Norte';
    const ESTE = 'Este';
    const SUR = 'Sur';
    const OESTE = 'Oeste';

    private $moduloOrientacion;

    /**
     * @param ModuloOrientacion $modulo
     */
    public function __construct($modulo = null)
    {
        $this->moduloOrientacion = new ModuloOrientacionNorte();
    }

    public function haciaDondeNosDirigimos()
    {
        return $this->moduloOrientacion->haciaDondeNosDirigimos();
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario()
    {
        $this->moduloOrientacion = $this->moduloOrientacion->girarSentidoHorario();
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario()
    {
        $this->moduloOrientacion = $this->moduloOrientacion->girarSentidoAntihorario();
    }

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion)
    {
        $this->moduloOrientacion->avanzar($posicion);
    }

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion)
    {
        $this->moduloOrientacion->retroceder($posicion);
    }

}