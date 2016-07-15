<?php
/**
 * Created by PhpStorm.
 * User: pvassoilles
 * Date: 15/07/16
 * Time: 10:57
 */

namespace EntityBundle\Entity;


use Sonata\PageBundle\Entity\BaseSite;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Site
 *
 * @package EntityBundle\Entity
 *
 * @ORM\Entity(repositoryClass="EntityBundle\Entity\Repository\SiteRepository")
 * @ORM\Table(name="sonata_site")
 */
class Site extends BaseSite
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    


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