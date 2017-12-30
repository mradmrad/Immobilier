<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeBien
 *
 * @ORM\Table(name="type_bien")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TypeBienRepository")
 */
class   TypeBien implements \JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="bedroom", type="boolean", nullable=true)
     */
    private $bedroom;

    /**
     * @var bool
     *
     * @ORM\Column(name="bathroom", type="boolean", nullable=true)
     */
    private $bathroom;

    /**
     * @var bool
     *
     * @ORM\Column(name="furnished", type="boolean", nullable=true)
     */
    private $furnished;

    /**
     * @var bool
     *
     * @ORM\Column(name="equipped", type="boolean", nullable=true)
     */
    private $equipped;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;


    public function __construct()
    {
        $this->creationDate = new \Datetime();
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TypeBien
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set bedroom
     *
     * @param boolean $bedroom
     *
     * @return TypeBien
     */
    public function setBedroom($bedroom)
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    /**
     * Get bedroom
     *
     * @return bool
     */
    public function getBedroom()
    {
        return $this->bedroom;
    }

    /**
     * Set bathroom
     *
     * @param boolean $bathroom
     *
     * @return TypeBien
     */
    public function setBathroom($bathroom)
    {
        $this->bathroom = $bathroom;

        return $this;
    }

    /**
     * Get bathroom
     *
     * @return bool
     */
    public function getBathroom()
    {
        return $this->bathroom;
    }

    /**
     * Set furnished
     *
     * @param boolean $furnished
     *
     * @return TypeBien
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;

        return $this;
    }

    /**
     * Get furnished
     *
     * @return bool
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * Set equipped
     *
     * @param boolean $equipped
     *
     * @return TypeBien
     */
    public function setEquipped($equipped)
    {
        $this->equipped = $equipped;

        return $this;
    }

    /**
     * Get equipped
     *
     * @return bool
     */
    public function getEquipped()
    {
        return $this->equipped;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return TypeBien
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }


    /**
     * Set category
     *
     * @param \SBC\BienBundle\Entity\Category $category
     *
     * @return TypeBien
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \SBC\BienBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __toString()
    {
        return $this->name;
    }
}

