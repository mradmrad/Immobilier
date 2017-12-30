<?php
/**
 * Created by PhpStorm.
 * User: SlimenTN
 * Date: 11/22/17
 * Time: 2:35 PM
 */

namespace SBC\UtilsBundle\Utils;


use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\PropertyAccess\PropertyAccessor;

class FieldsComparator
{
    /**
     * @var PropertyAccessor
     */
    private $accessor;

    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * @var object
     */
    private $first;

    /**
     * @var object
     */
    private $second;

    /**
     * @var string
     */
    private $class;

    function __construct(PropertyAccessor $accessor, Registry $doctrine)
    {
        $this->accessor = $accessor;
        $this->doctrine = $doctrine;
    }

    /**
     * Takes two objects and compare their fields
     * @param $first object: First object
     * @param $second object: Second object
     * @return array list of changed fields with the old and new content of each field
     * @throws NotSameObjectException
     */
    public function compare($first, $second){
        
        if(get_class($first) != get_class($second)){
            throw new NotSameObjectException();
        }else{
            $this->first = $first;
            $this->second = $second;
            $this->class = get_class($first);
            return $this->proceed();
        }
        
    }

    /**
     * Start comparison
     */
    private function proceed(){
        $changedFields = array();
        $metadata = $this->doctrine->getManager()->getClassMetadata($this->class);
//        var_dump($metadata->getFieldNames());
        foreach ($metadata->getFieldNames() as $field){
            $_fv = $this->accessor->getValue($this->first, $field);
            $_sv = $this->accessor->getValue($this->second, $field);

            if($_fv != $_sv){
                $f = array(
                    'first' => $_fv,
                    'second' => $_sv,
                );
                $changedFields[$field] = $f;
            }
        }
//        var_dump($changedFields);
        return $changedFields;
    }
}

/**
 * Class NotSameObjectException
 * @package SBC\UtilityBundle\Util
 */
class NotSameObjectException extends \Exception{
    
    function __construct()
    {
        parent::__construct("These objects are not the same");
    }
}