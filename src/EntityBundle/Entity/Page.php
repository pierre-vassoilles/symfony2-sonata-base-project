<?php
/**
 * Created by PhpStorm.
 * User: pvassoilles
 * Date: 15/07/16
 * Time: 10:57
 */

namespace EntityBundle\Entity;


use Sonata\PageBundle\Entity\BasePage;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Site
 *
 * @package EntityBundle\Entity
 *
 * @ORM\Entity(repositoryClass="EntityBundle\Entity\Repository\PageRepository")
 * @ORM\Table(name="sonata_page")
 */
class Page extends BasePage
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