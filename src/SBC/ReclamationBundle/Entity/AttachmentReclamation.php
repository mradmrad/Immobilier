<?php

namespace SBC\ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\AttachmentBundle\Entity\Attachment;

/**
 * AttachmentReclamation
 *
 * @ORM\Table(name="attachment_reclamation")
 * @ORM\Entity(repositoryClass="SBC\ReclamationBundle\Repository\AttachmentReclamationRepository")
 */
class AttachmentReclamation extends Attachment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Reclamation
     *
     * @ORM\ManyToOne(targetEntity="Reclamation", inversedBy="attachments")
     */
    private $reclamation;


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
     * Set reclamation
     *
     * @param \SBC\ReclamationBundle\Entity\Reclamation $reclamation
     *
     * @return AttachmentReclamation
     */
    public function setReclamation(\SBC\ReclamationBundle\Entity\Reclamation $reclamation = null)
    {
        $this->reclamation = $reclamation;

        return $this;
    }

    /**
     * Get reclamation
     *
     * @return \SBC\ReclamationBundle\Entity\Reclamation
     */
    public function getReclamation()
    {
        return $this->reclamation;
    }
}
