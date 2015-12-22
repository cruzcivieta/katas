<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 22/12/15
 * Time: 9:36
 */

namespace RoverMars;


class MapaPlaneta
{
    private $radio;
    private $obstaculos = array();

    /**
     * Planeta constructor.
     * @param int $radio
     */
    public function __construct($radio)
    {
        $this->radio = abs($radio);
    }

    /**
     * @return int
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * @return int
     */
    public function getLimiteNorte()
    {
        return $this->radio;
    }

    /**
     * @return int
     */
    public function getLimiteEste()
    {
        return $this->radio;
    }

    /**
     * @return int
     */
    public function getLimiteOeste()
    {
        return $this->radio * (-1);
    }

    /**
     * @return int
     */
    public function getLimiteSur()
    {
        return $this->radio * (-1);
    }

    public function addObstaculo(Obstaculo $obstaculo, Posicion $posicion)
    {
        $this->obstaculos[$this->crearClaveObstaculos($posicion)] = $obstaculo;
    }

    public function hayObstaculoEn(Posicion $posicion)
    {
        if (!array_key_exists($this->crearClaveObstaculos($posicion), $this->obstaculos)) {
            return false;
        }

        return $this->obstaculos[$this->crearClaveObstaculos($posicion)];
    }

    private function crearClaveObstaculos(Posicion $posicion)
    {
        return $posicion->getX() . '-' . $posicion->getY();
    }
}