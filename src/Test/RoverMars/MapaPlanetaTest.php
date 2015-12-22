<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 22/12/15
 * Time: 9:20
 */

namespace Test\RoverMars;


use RoverMars\MapaPlaneta;
use RoverMars\Obstaculo;
use RoverMars\Posicion;

class MapaPlanetaTest extends \PHPUnit_Framework_TestCase
{

    public function testPlanetaTieneDimensiones()
    {
        $planeta = new MapaPlaneta(5);
        $this->assertEquals(5, $planeta->getRadio());
        $this->assertEquals(5, $planeta->getLimiteNorte());
        $this->assertEquals(5, $planeta->getLimiteEste());
        $this->assertEquals(-5, $planeta->getLimiteSur());
        $this->assertEquals(-5, $planeta->getLimiteOeste());
    }

    public function testPlanetaPuedeAlbergarObstaculos()
    {
        $planeta = new MapaPlaneta(5);

        $planeta->addObstaculo(new Obstaculo("Pared"),  new Posicion(0, 3));
        $this->assertInstanceOf(Obstaculo::class, $planeta->hayObstaculoEn(new Posicion(0, 3)));
        $this->assertFalse($planeta->hayObstaculoEn(new Posicion(0, 5)));

    }
}