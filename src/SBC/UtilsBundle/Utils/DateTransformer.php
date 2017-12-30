<?php

namespace SBC\UtilsBundle\Utils;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class DateTransformer
 * @package SBC\UtilsBundle\Utils
 *
 * Class responsible of date transformation inside FormType by given format
 */
class DateTransformer implements DataTransformerInterface
{
    /**
     * @var string
     */
    private $format;

    function __construct($format)
    {
        $this->format = $format;
    }

    // transform the date object to a string
    public function transform($dateObject)
    {
        return ($dateObject instanceof \DateTime) ? $dateObject->format($this->format) : null;
    }

    // transform the string back to an object
    public function reverseTransform($dateString)
    {
        return ($dateString != '') ? \DateTime::createFromFormat($this->format, $dateString) : null;
    }
}