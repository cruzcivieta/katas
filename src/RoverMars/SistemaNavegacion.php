<?php
/**
 * User: dcruz
 * Date: 29/11/15
 * Time: 19:49
 */

namespace RoverMars;


class SistemaNavegacion implements ModuloOrientacion
{
    const ORIENTACION_INICIAL = 0;
    const PUNTOS_CARDINALES = [self::NORTE, self::ESTE, self::SUR, self::OESTE];
    const ANTI_HORARIO = 3;
    const HORARIO  = 1;
    const NORTE = 'Norte';
    const ESTE = 'Este';
    const SUR = 'Sur';
    const OESTE = 'Oeste';

    private $orientacion = SistemaNavegacion::ORIENTACION_INICIAL;
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

    public function girarDerecha()
    {
        $this->girar(SistemaNavegacion::HORARIO );
    }

    public function girarIzquierda()
    {
        $this->girar(SistemaNavegacion::ANTI_HORARIO);
    }

    private function girar($sentido)
    {
        $this->orientacion += $sentido;
        $this->orientacion %= count(SistemaNavegacion::PUNTOS_CARDINALES) ;
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