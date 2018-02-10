<?php

namespace SBC\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use SBC\PersonnelBundle\Entity\Personnel;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="SBC\UserBundle\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User extends BaseUser implements \JsonSerializable
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
     * @ORM\OneToOne(targetEntity="SBC\PersonnelBundle\Entity\Personnel", inversedBy="user" , cascade={"persist"})
     */
    private $personnel;

    /**
     * @ORM\OneToMany(targetEntity="SBC\UserBundle\Entity\AccessHistory", mappedBy="user")
     */
    private $accesses;





    public function __construct()
    {
        parent::__construct();
        $this->accesses = new ArrayCollection();
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Set personnel
     *
     * @param \SBC\PersonnelBundle\Entity\Personnel $personnel
     *
     * @return User
     */
    public function setPersonnel(Personnel $personnel = null)
    {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * Get personnel
     *
     * @return \SBC\PersonnelBundle\Entity\Personnel
     */
    public function getPersonnel()
    {
        return $this->personnel;
    }

//    public function getRoles()
//    {
//        parent::getRoles();
//    }


    /**
     * @param AccessHistory $accesses
     * @return User
     */
    public function addAccess(AccessHistory $accessHistory)
    {
        $this->accesses[] = $accessHistory;
        $accessHistory->setUser($this);

        return $this;
    }

    /**
     * @param AccessHistory $tache
     */
    public function removeAccess(AccessHistory $accessHistory)
    {
        $this->accesses->removeElement($accessHistory);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        $accessHistory->setUser(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getAccesses()
    {
        return $this->accesses;
    }



    public function setUsername($username)
    {
        $username = is_null($username) ? '' : $username;
        parent::setUsername($username);
        $this->setEmail($username.'@green-duck.tn');

        return $this;
    }
}
