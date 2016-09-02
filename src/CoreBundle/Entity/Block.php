<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\Block
 *
 * @ORM\Entity()
 * @ORM\Table(name="block", uniqueConstraints={@ORM\UniqueConstraint(name="tag_unique", columns={"tag"})})
 */
class Block
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $tag;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $administrable;

    /**
     * @ORM\ManyToMany(targetEntity="BlockField", inversedBy="blocks")
     * @ORM\JoinTable(name="asso_block_field",
     *     joinColumns={@ORM\JoinColumn(name="block_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="block_field_id", referencedColumnName="id")}
     * )
     */
    protected $blockFields;

    /**
     * @ORM\ManyToMany(targetEntity="Homepage", mappedBy="blocks")
     */
    protected $homepages;

    /**
     * @ORM\ManyToMany(targetEntity="Page", inversedBy="blocks")
     * @ORM\JoinTable(name="asso_page_block",
     *     joinColumns={@ORM\JoinColumn(name="block_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="page_id", referencedColumnName="id")}
     * )
     */
    protected $pages;

    public function __construct()
    {
        $this->blockFields = new ArrayCollection();
        $this->homepages = new ArrayCollection();
        $this->pages = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Block
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
     * Set the value of label.
     *
     * @param string $label
     * @return \CoreBundle\Entity\Block
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of tag.
     *
     * @param string $tag
     * @return \CoreBundle\Entity\Block
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get the value of tag.
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of administrable.
     *
     * @param boolean $administrable
     * @return \CoreBundle\Entity\Block
     */
    public function setAdministrable($administrable)
    {
        $this->administrable = $administrable;

        return $this;
    }

    /**
     * Get the value of administrable.
     *
     * @return boolean
     */
    public function getAdministrable()
    {
        return $this->administrable;
    }

    /**
     * Add BlockField entity to collection.
     *
     * @param \CoreBundle\Entity\BlockField $blockField
     * @return \CoreBundle\Entity\Block
     */
    public function addBlockField(BlockField $blockField)
    {
        $this->blockFields[] = $blockField;

        return $this;
    }

    /**
     * Get BlockField entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlockFields()
    {
        return $this->blockFields;
    }

    /**
     * Add Homepage entity to collection.
     *
     * @param \CoreBundle\Entity\Homepage $homepage
     * @return \CoreBundle\Entity\Block
     */
    public function addHomepage(Homepage $homepage)
    {
        $this->homepages[] = $homepage;

        return $this;
    }

    /**
     * Get Homepage entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHomepages()
    {
        return $this->homepages;
    }

    /**
     * Add Page entity to collection.
     *
     * @param \CoreBundle\Entity\Page $page
     * @return \CoreBundle\Entity\Block
     */
    public function addPage(Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Get Page entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    public function __sleep()
    {
        return array('Id', 'Label', 'Tag', 'Administrable');
    }
}
