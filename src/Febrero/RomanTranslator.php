<?php
/**

 * User: dcruz
 * Date: 2/11/15
 * Time: 17:22
 */

namespace Febrero;


class RomanTranslator
{
    const I = 'I';
    const V = 'V';
    const X = 'X';
    const L = 'L';
    const C = 'C';
    const D = 'D';
    const M = 'M';

    protected $base = [
        1 => [self::I, self::V, self::X],
        2 => [self::X, self::L, self::C],
        3 => [self::C, self::D, self::M],
    ];

    public function trans($number)
    {
        $numberString = (string) $number;
        $roman = '';
        for($i = 0; $i < strlen($numberString); $i++){
            $roman .= $this->transDigito($numberString[$i], strlen($numberString) - $i);
        }

        return $roman;
    }

    private function transDigito($number, $length)
    {
        if ($length > 3) {
            $roman = '';
            for ($i=0; $i<$number; $i++) {
                $roman .= self::M;
            }

            return $roman;
        }

        $base = $this->base[$length];
        $roman = '';
        if ($number < 5) {
            if ($number == 4) {
                $roman = $base[0] .  $base[1];
            } else {
                for ($i = 0; $i < $number; $i++) {
                    $roman .= $base[0];
                }
            }
        } else {
            if ($number == 9) {
                $roman = $base[0] . $base[2];
            } else {
                $roman = $base[1];
                if ($number > 5) {
                    $roman .= $this->transDigito($number - 5, $length);
                }
            }
        }

        return $roman;
    }
}