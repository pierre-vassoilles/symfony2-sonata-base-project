<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\Homepage
 *
 * @ORM\Entity()
 * @ORM\Table(name="homepage", indexes={@ORM\Index(name="fk_homepage_metadata1_idx", columns={"metadata_id"})})
 */
class Homepage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Metadata", inversedBy="homepages")
     * @ORM\JoinColumn(name="metadata_id", referencedColumnName="id", nullable=false)
     */
    protected $metadata;

    /**
     * @ORM\ManyToMany(targetEntity="Block", inversedBy="homepages")
     * @ORM\JoinTable(name="asso_homepage_block",
     *     joinColumns={@ORM\JoinColumn(name="homepage_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="block_id", referencedColumnName="id")}
     * )
     */
    protected $blocks;

    public function __construct()
    {
        $this->blocks = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Homepage
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
     * Set Metadata entity (many to one).
     *
     * @param \CoreBundle\Entity\Metadata $metadata
     * @return \CoreBundle\Entity\Homepage
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
     * @return \CoreBundle\Entity\Homepage
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
