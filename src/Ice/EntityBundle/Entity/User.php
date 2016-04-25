<?php
/**
 * Created by PhpStorm.
 * User: pv
 * Date: 25/04/2016
 * Time: 15:49
 */

namespace Ice\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 *
 * @package Ice\EntityBundle\Entity
 *
 * @ORM\Entity(repositoryClass="Ice\EntityBundle\Entity\Repository\UserRepository")
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

}