<?php
/**
 * Created by PhpStorm.
 * User: pv
 * Date: 25/04/2016
 * Time: 15:49
 */

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 *
 * @package EntityBundle\Entity
 *
 * @ORM\Entity(repositoryClass="EntityBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends \FOS\UserBundle\Entity\User
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    protected $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    protected $lastname;



    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

}