<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\Metadata
 *
 * @ORM\Entity()
 * @ORM\Table(name="metadata")
 */
class Metadata
{

    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Homepage", mappedBy="metadata")
     * @ORM\JoinColumn(name="metadata_id", referencedColumnName="id", nullable=false)
     */
    protected $homepages;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="metadata")
     * @ORM\JoinColumn(name="metadata_id", referencedColumnName="id", nullable=false)
     */
    protected $pages;

    public function __construct()
    {
        $this->homepages = new ArrayCollection();
        $this->metadataTranslations = new ArrayCollection();
        $this->pages = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Metadata
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
     * Add Homepage entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Homepage $homepage
     * @return \CoreBundle\Entity\Metadata
     */
    public function addHomepage(Homepage $homepage)
    {
        $this->homepages[] = $homepage;

        return $this;
    }

    /**
     * Get Homepage entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHomepages()
    {
        return $this->homepages;
    }

    /**
     * Add MetadataTranslation entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\MetadataTranslation $metadataTranslation
     * @return \CoreBundle\Entity\Metadata
     */
    public function addMetadataTranslation(MetadataTranslation $metadataTranslation)
    {
        $this->metadataTranslations[] = $metadataTranslation;

        return $this;
    }

    /**
     * Get MetadataTranslation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetadataTranslations()
    {
        return $this->metadataTranslations;
    }

    /**
     * Add Page entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Page $page
     * @return \CoreBundle\Entity\Metadata
     */
    public function addPage(Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Get Page entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    public function __sleep()
    {
        return array('Id');
    }
}
