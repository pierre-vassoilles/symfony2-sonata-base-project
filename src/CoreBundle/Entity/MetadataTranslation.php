<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\MetadataTranslation
 *
 * @ORM\Entity()
 * @ORM\Table(name="metadata_translation", indexes={@ORM\Index(name="fk_metadata_translation_metadata1_idx", columns={"translatable_id"})})
 */
class MetadataTranslation
{

    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="meta_title", type="string", length=255)
     */
    protected $metaTitle;

    /**
     * @ORM\Column(name="meta_description", type="string", length=255, nullable=true)
     */
    protected $metaDescription;

    /**
     * @ORM\Column(name="meta_keywords", type="string", length=255, nullable=true)
     */
    protected $metaKeywords;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $h1;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\MetadataTranslation
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
     * Set the value of metaTitle.
     *
     * @param string $metaTitle
     * @return \CoreBundle\Entity\MetadataTranslation
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get the value of metaTitle.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set the value of metaDescription.
     *
     * @param string $metaDescription
     * @return \CoreBundle\Entity\MetadataTranslation
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get the value of metaDescription.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set the value of metaKeywords.
     *
     * @param string $metaKeywords
     * @return \CoreBundle\Entity\MetadataTranslation
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get the value of metaKeywords.
     *
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set the value of h1.
     *
     * @param string $h1
     * @return \CoreBundle\Entity\MetadataTranslation
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;

        return $this;
    }

    /**
     * Get the value of h1.
     *
     * @return string
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * Set the value of locale.
     *
     * @param string $locale
     * @return \CoreBundle\Entity\MetadataTranslation
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
     * Set Metadata entity (many to one).
     *
     * @param \CoreBundle\Entity\Metadata $metadata
     * @return \CoreBundle\Entity\MetadataTranslation
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

    public function __sleep()
    {
        return array('Id', 'TranslatableId', 'MetaTitle', 'MetaDescription', 'MetaKeywords', 'H1', 'Locale');
    }
}
