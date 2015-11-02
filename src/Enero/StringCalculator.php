<?php
/**
 * User: dcruz
 * Date: 2/11/15
 * Time: 13:13
 */

namespace Enero;


class StringCalculator
{
    public function add($string)
    {
        if ($string == '') {
            return 0;
        }

        if (strlen($string) == 1) {
            return (int)  $string;
        }

        $delimiter = $this->getDelimiter($string);

        $numbers = null;
        if ($this->checkNegativesNumber($string, $delimiter, $numbers)) {
            throw new \Exception(
                sprintf('NegtiveFoundException: Números negativos no permitidos: %s', implode(', ', $numbers)));
        }

        $string = str_replace('\n', ',', $string);
        $string = str_replace("\n", ',', $string);
        $string = str_replace($delimiter, ',', $string);

        return array_sum(explode(',', $string));
    }

    public function getDelimiter($string, $default = ',')
    {
        if (!preg_match('/^\/\/.{1}\\n/', $string)) {
            return $default;
        }

        return $string[2];
    }

    private function checkNegativesNumber($string, $delimiter, &$numbers)
    {
        if (!preg_match_all(sprintf("/%s-\\d/", $delimiter), $string, $matches)) {
            return false;
        }

        $numbers = array_map(function($element) use ($delimiter) {
            return str_replace($delimiter, '', $element);
        }, $matches[0]);

        return true;
    }
}