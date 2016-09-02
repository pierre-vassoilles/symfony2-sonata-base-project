<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\Menu
 *
 * @ORM\Entity()
 * @ORM\Table(name="menu", indexes={@ORM\Index(name="fk_menu_page1_idx", columns={"page_id"})})
 */
class Menu
{

    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="menus")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=false)
     */
    protected $page;

    public function __construct()
    {
        $this->menuTranslations = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Menu
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add MenuTranslation entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\MenuTranslation $menuTranslation
     * @return \CoreBundle\Entity\Menu
     */
    public function addMenuTranslation(MenuTranslation $menuTranslation)
    {
        $this->menuTranslations[] = $menuTranslation;

        return $this;
    }

    /**
     * Get MenuTranslation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMenuTranslations()
    {
        return $this->menuTranslations;
    }

    /**
     * Set Page entity (many to one).
     *
     * @param \CoreBundle\Entity\Page $page
     * @return \CoreBundle\Entity\Menu
     */
    public function setPage(Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get Page entity (many to one).
     *
     * @return \CoreBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    public function __sleep()
    {
        return array('Id', 'PageId');
    }
}
