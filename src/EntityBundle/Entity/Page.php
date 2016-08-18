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
use Sonata\PageBundle\Model\PageInterface;
use Sonata\PageBundle\Model\SiteInterface;

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
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Site")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $site;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Page", inversedBy="children")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $parent;


    /**
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\Page", mappedBy="parent")
     */
    protected $children;

    /**
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\Block", mappedBy="page")
     */
    protected $blocks;


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
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite(SiteInterface $site)
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }
}