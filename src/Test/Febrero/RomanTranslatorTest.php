<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 2/11/15
 * Time: 17:23
 */

namespace Febrero;


class RomanTranslatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  RomanTranslator */
    protected $rt;

    public static function setUpBeforeClass()
    {
        echo 'Febrero';
    }

    protected function setUp()
    {
        $this->rt = new RomanTranslator();
    }


    public function testConversionUnDigito()
    {
        $this->assertEquals('I', $this->rt->trans(1), 'I = 1');
        $this->assertEquals('II', $this->rt->trans(2), 'II = 2');
        $this->assertEquals('III', $this->rt->trans(3), 'III = 3');
        $this->assertEquals('IV', $this->rt->trans(4), 'IV = 4');
        $this->assertEquals('V', $this->rt->trans(5), 'V = 5');
        $this->assertEquals('VI', $this->rt->trans(6), 'VI = 6');
        $this->assertEquals('VII', $this->rt->trans(7), 'VII = 6');
        $this->assertEquals('VIII', $this->rt->trans(8), 'VIII = 6');
        $this->assertEquals('IX', $this->rt->trans(9), 'IX = 9');
    }

    public function testConversionDosDigitos()
    {
        $this->assertEquals('X', $this->rt->trans(10), 'X = 10');
        $this->assertEquals('XI', $this->rt->trans(11), 'XI = 11');
        $this->assertEquals('XII', $this->rt->trans(12), 'XII = 12');
        $this->assertEquals('XIII', $this->rt->trans(13), 'XIII = 13');
        $this->assertEquals('XIV', $this->rt->trans(14), 'XIV = 14');
        $this->assertEquals('XV', $this->rt->trans(15), 'XV = 15');
        $this->assertEquals('XVI', $this->rt->trans(16), 'XV = 16');
        $this->assertEquals('XVII', $this->rt->trans(17), 'XV = 17');
        $this->assertEquals('XVIII', $this->rt->trans(18), 'XV = 18');
        $this->assertEquals('XIX', $this->rt->trans(19), 'XIX = 19');
        $this->assertEquals('XX', $this->rt->trans(20), 'XX = 20');
        $this->assertEquals('XXXV', $this->rt->trans(35), 'XXXV = 35');
        $this->assertEquals('XL', $this->rt->trans(40), 'XL = 40');
        $this->assertEquals('XLV', $this->rt->trans(45), 'XLV = 45');
        $this->assertEquals('LXXV', $this->rt->trans(75), 'XLV = 75');
        $this->assertEquals('LXXXVII', $this->rt->trans(87), 'XLV = 87');
        $this->assertEquals('XCV', $this->rt->trans(95), 'XCV = 95');
    }

    public function testConversionTresDigitos()
    {
        $this->assertEquals('C', $this->rt->trans(100), 'C = 100');
        $this->assertEquals('CMXCIX', $this->rt->trans(999), 'CMXCIX = 999');
        $this->assertEquals('DLV', $this->rt->trans(555), 'DLV = 555');
    }

    public function testConversionCualquiera()
    {
        $this->assertEquals('MCMXCVIII', $this->rt->trans(1998), 'MCMXCVIII = 1998');
    }

    public function testConversionMayorDe4Cifras()
    {
        $this->assertEquals('MMMMCMXCVIII', $this->rt->trans(4998), 'MMMMCMXCVIII = 4998');
        $this->assertEquals('MMCMXCVIII', $this->rt->trans(2998), 'MMMMCMXCVIII = 2998');
    }


//    /** Developer test */
//    public function testLength()
//    {
//        $this->assertEquals(4, $this->rt->trans(4998), '4998 tiene 4 digitos');
//    }
}
