<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 22/12/15
 * Time: 9:45
 */

namespace RoverMars;


abstract class AbstractoModuloOrientacion implements ModuloOrientacion
{
    protected $mapaPlaneta;

    /**
     * AbstractoModuloOrientacion constructor.
     * @param MapaPlaneta $planeta
     */
    public function __construct(MapaPlaneta $planeta)
    {
        $this->mapaPlaneta = $planeta;
    }

    protected function estoyEnElLimiteNorte(Posicion $posicion)
    {
        return $posicion->getY() === $this->mapaPlaneta->getLimiteNorte();
    }

    protected function estoyEnElLimiteSur(Posicion $posicion)
    {
        return $posicion->getY() === $this->mapaPlaneta->getLimiteSur();
    }

    protected function estoyEnElLimiteEste(Posicion $posicion)
    {
        return $posicion->getX() === $this->mapaPlaneta->getLimiteEste();
    }

    protected function estoyEnElLimiteOeste(Posicion $posicion)
    {
        return $posicion->getX() === $this->mapaPlaneta->getLimiteOeste();
    }

    abstract public function girarSentidoHorario();
    abstract public function girarSentidoAntihorario();
    abstract public function avanzar(Posicion $posicion);
    abstract public function retroceder(Posicion $posicion);
    abstract public function haciaDondeNosDirigimos();
}