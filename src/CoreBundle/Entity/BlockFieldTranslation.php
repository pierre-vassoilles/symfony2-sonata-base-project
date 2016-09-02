<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\BlockFieldTranslation
 *
 * @ORM\Entity()
 * @ORM\Table(name="block_field_translation", indexes={@ORM\Index(name="fk_block_field_translation_block_field1_idx", columns={"translatable_id"})})
 */
class BlockFieldTranslation
{

    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $value;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\BlockFieldTranslation
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
     * Set the value of value.
     *
     * @param string $value
     * @return \CoreBundle\Entity\BlockFieldTranslation
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of locale.
     *
     * @param string $locale
     * @return \CoreBundle\Entity\BlockFieldTranslation
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get the value of locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set BlockField entity (many to one).
     *
     * @param \CoreBundle\Entity\BlockField $blockField
     * @return \CoreBundle\Entity\BlockFieldTranslation
     */
    public function setBlockField(BlockField $blockField = null)
    {
        $this->blockField = $blockField;

        return $this;
    }

    /**
     * Get BlockField entity (many to one).
     *
     * @return \CoreBundle\Entity\BlockField
     */
    public function getBlockField()
    {
        return $this->blockField;
    }

    public function __sleep()
    {
        return array('Id', 'TranslatableId', 'Value', 'Locale');
    }
}
