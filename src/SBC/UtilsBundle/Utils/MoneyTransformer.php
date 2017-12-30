<?php

namespace SBC\UtilsBundle\Utils;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class DateTransformer
 * @package SBC\UtilsBundle\Utils
 *
 * Class responsible of date transformation inside FormType by given format
 */
class MoneyTransformer implements DataTransformerInterface
{

    // transform the double object to a string
    public function transform($double)
    {
//        die(var_dump($double));
        return number_format($double, 3, ',', ' ');
    }

    // transform the string back to an double
    public function reverseTransform($string)
    {
//        die(var_dump((float) str_replace(',', '.', str_replace(" ", "", $string))));
        return (float) str_replace(',', '.', str_replace(" ", "", $string));

    }
}