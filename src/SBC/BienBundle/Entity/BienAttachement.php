<?php

namespace SBC\BienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\AttachmentBundle\Entity\Attachment;

/**
 * BienAttachement
 *
 * @ORM\Table(name="bien_attachement")
 * @ORM\Entity(repositoryClass="SBC\BienBundle\Repository\BienAttachementRepository")
 */
class BienAttachement extends Attachment
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
     * @ORM\ManyToOne(targetEntity="SBC\BienBundle\Entity\Bien", inversedBy="papers")
     */
    protected $bien;


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
     * Set bien
     *
     * @param \SBC\BienBundle\Entity\Bien $bien
     *
     * @return BienAttachement
     */
    public function setBien(\SBC\BienBundle\Entity\Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \SBC\BienBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }
}
