<?php
namespace SBC\AttachmentBundle\Entity;


use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Attachment
 * @package SBC\AttachmentBundle\Entity
 * 
 * @Vich\Uploadable
 */
class Attachment
{
    /**
     * @var File
     *
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="filePath")
     *
     */
    protected $file;

    /**
     * @var string
     * @ORM\Column(name="file_path", type="string", length=255)
     */
    protected $filePath;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_update", type="datetime")
     */
    protected $dateUpdate;

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param File $file
     */
    public function setFile($file)
    {
        $this->file = $file;

        if ($file instanceof UploadedFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->setDateUpdate(new \DateTime('now'));

        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param \DateTime $dateUpdate
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }
    
    
}