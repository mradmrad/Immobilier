<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeTache
 *
 * @ORM\Table(name="type_tache")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\TypeTacheRepository")
 */
class TypeTache
{
    const TEL = 'Téléphone';
    const MAIL = 'Mail';
    const DIRECT = 'Contact directe';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=255, nullable=true)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255 , nullable=true)
     */
    private $category;




    /**
     * @var boolean
     *
     * @ORM\Column(name="show_calendar", type="boolean")
     */
    private $show_calendar;
    

    public function __construct()
    {
        $this->creationDate = new \Datetime();
    }

    public function __toString()
    {
        return $this->title;
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return TypeTache
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
     * Set icon
     *
     * @param string $icon
     *
     * @return TypeTache
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set class
     *
     * @param string $class
     *
     * @return TypeTache
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TypeTache
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set showCalendar
     *
     * @param boolean $showCalendar
     *
     * @return TypeTache
     */
    public function setShowCalendar($showCalendar)
    {
        $this->show_calendar = $showCalendar;

        return $this;
    }

    /**
     * Get showCalendar
     *
     * @return boolean
     */
    public function getShowCalendar()
    {
        return $this->show_calendar;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return TypeTache
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}
