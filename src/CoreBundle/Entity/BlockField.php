<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\BlockField
 *
 * @ORM\Entity()
 * @ORM\Table(name="block_field")
 */
class BlockField
{

    use ORMBehaviors\Translatable\Translatable;


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="field_type", type="string", length=255)
     */
    protected $fieldType;

    /**
     * @ORM\Column(name="form_options", type="text", nullable=true)
     */
    protected $formOptions;

    /**
     * @ORM\ManyToMany(targetEntity="Block", mappedBy="blockFields")
     */
    protected $blocks;

    public function __construct()
    {
        $this->blockFieldTranslations = new ArrayCollection();
        $this->blocks = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\BlockField
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
     * Set the value of fieldType.
     *
     * @param string $fieldType
     * @return \CoreBundle\Entity\BlockField
     */
    public function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;

        return $this;
    }

    /**
     * Get the value of fieldType.
     *
     * @return string
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * Set the value of formOptions.
     *
     * @param string $formOptions
     * @return \CoreBundle\Entity\BlockField
     */
    public function setFormOptions($formOptions)
    {
        $this->formOptions = $formOptions;

        return $this;
    }

    /**
     * Get the value of formOptions.
     *
     * @return string
     */
    public function getFormOptions()
    {
        return $this->formOptions;
    }

    /**
     * Add BlockFieldTranslation entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\BlockFieldTranslation $blockFieldTranslation
     * @return \CoreBundle\Entity\BlockField
     */
    public function addBlockFieldTranslation(BlockFieldTranslation $blockFieldTranslation)
    {
        $this->blockFieldTranslations[] = $blockFieldTranslation;

        return $this;
    }

    /**
     * Get BlockFieldTranslation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlockFieldTranslations()
    {
        return $this->blockFieldTranslations;
    }

    /**
     * Add Block entity to collection.
     *
     * @param \CoreBundle\Entity\Block $block
     * @return \CoreBundle\Entity\BlockField
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
        return array('Id', 'FieldType', 'FormOptions');
    }
}
