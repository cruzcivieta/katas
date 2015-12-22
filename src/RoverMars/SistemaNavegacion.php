<?php
/**
 * User: dcruz
 * Date: 29/11/15
 * Time: 19:49
 */

namespace RoverMars;


use RoverMars\Exception\ObstaculoEncontradoException;

class SistemaNavegacion implements ModuloOrientacion
{
    const NORTE = 'Norte';
    const ESTE = 'Este';
    const SUR = 'Sur';
    const OESTE = 'Oeste';

    /**
     * @var ModuloOrientacion
     */
    private $moduloOrientacion;
    private $mapaPlaneta;

    /**
     * @param MapaPlaneta $mapaPlaneta
     * @param ModuloOrientacion $modulo
     */
    public function __construct(MapaPlaneta $mapaPlaneta, ModuloOrientacion $modulo)
    {
        $this->mapaPlaneta = $mapaPlaneta;
        $this->moduloOrientacion = $modulo;
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
     * @throws ObstaculoEncontradoException
     */
    public function avanzar(Posicion $posicion)
    {
        $this->moduloOrientacion->avanzar($posicion);

        $obstaculo = $this->mapaPlaneta->hayObstaculoEn($posicion);
        if ($obstaculo) {
            $this->moduloOrientacion->retroceder($posicion);
            throw new ObstaculoEncontradoException($obstaculo);
        }
    }

    /**
     * @param Posicion $posicion
     * @throws ObstaculoEncontradoException
     */
    public function retroceder(Posicion $posicion)
    {
        $this->moduloOrientacion->retroceder($posicion);

        $obstaculo = $this->mapaPlaneta->hayObstaculoEn($posicion);
        if ($obstaculo) {
            $this->moduloOrientacion->avanzar($posicion);
            throw new ObstaculoEncontradoException($obstaculo);
        }
    }

}