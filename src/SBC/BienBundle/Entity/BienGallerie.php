<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BienGallerie
 *
 * @ORM\Table(name="bien_gallerie")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\BienGallerieRepository")
 */
class BienGallerie
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="SBC\BienBundle\Entity\BienPicture", mappedBy="bien")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $pictures;


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
     * Set description
     *
     * @param string $description
     *
     * @return BienGallerie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add picture
     *
     * @param \SBC\BienBundle\Entity\BienPicture $picture
     *
     * @return BienGallerie
     */
    public function addPicture(\SBC\BienBundle\Entity\BienPicture $picture)
    {
        $this->pictures[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \SBC\BienBundle\Entity\BienPicture $picture
     */
    public function removePicture(\SBC\BienBundle\Entity\BienPicture $picture)
    {
        $this->pictures->removeElement($picture);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}
