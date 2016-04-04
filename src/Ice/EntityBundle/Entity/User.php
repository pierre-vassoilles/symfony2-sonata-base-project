<?php

namespace Ice\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as FOSUser;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Ice\EntityBundle\Entity\PasswordHistory;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use VMelnik\DoctrineEncryptBundle\Configuration\Encrypted;

/**
 * Ice\EntityBundle\Entity\User
 *
 * Stocke tous les utilisateurs : Membres, Urgentistes, Administrateurs.
 * Contient les données communes à tous les utilisateurs.
 * Timestampable
 *
 * @ORM\Entity(repositoryClass="Ice\EntityBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends FOSUser
{
    use ORMBehaviors\Timestampable\Timestampable;

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
