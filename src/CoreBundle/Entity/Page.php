<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\Page
 *
 * @ORM\Entity()
 * @ORM\Table(name="page", indexes={@ORM\Index(name="fk_page_metadata1_idx", columns={"metadata_id"})})
 */
class Page
{

    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Menu", mappedBy="page")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=false)
     */
    protected $menus;

    /**
     * @ORM\ManyToOne(targetEntity="Metadata", inversedBy="pages")
     * @ORM\JoinColumn(name="metadata_id", referencedColumnName="id", nullable=false)
     */
    protected $metadata;

    /**
     * @ORM\ManyToMany(targetEntity="Block", mappedBy="pages")
     */
    protected $blocks;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->pageTranslations = new ArrayCollection();
        $this->blocks = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Page
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
     * Add Menu entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Menu $menu
     * @return \CoreBundle\Entity\Page
     */
    public function addMenu(Menu $menu)
    {
        $this->menus[] = $menu;

        return $this;
    }

    /**
     * Get Menu entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Add PageTranslation entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\PageTranslation $pageTranslation
     * @return \CoreBundle\Entity\Page
     */
    public function addPageTranslation(PageTranslation $pageTranslation)
    {
        $this->pageTranslations[] = $pageTranslation;

        return $this;
    }

    /**
     * Get PageTranslation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPageTranslations()
    {
        return $this->pageTranslations;
    }

    /**
     * Set Metadata entity (many to one).
     *
     * @param \CoreBundle\Entity\Metadata $metadata
     * @return \CoreBundle\Entity\Page
     */
    public function setMetadata(Metadata $metadata = null)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get Metadata entity (many to one).
     *
     * @return \CoreBundle\Entity\Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Add Block entity to collection.
     *
     * @param \CoreBundle\Entity\Block $block
     * @return \CoreBundle\Entity\Page
     */
    public function addBlock(Block $block)
    {
        $this->blocks[] = $block;

        return $this;
    }

    /**
     * Get Block entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    public function __sleep()
    {
        return array('Id', 'MetadataId');
    }
}
