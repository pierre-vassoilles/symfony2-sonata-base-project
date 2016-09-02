<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\PageTranslation
 *
 * @ORM\Entity()
 * @ORM\Table(name="page_translation", indexes={@ORM\Index(name="fk_page_translation_page_idx", columns={"translatable_id"})})
 */
class PageTranslation
{

    use ORMBehaviors\Translatable\Translation;

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
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $slug;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\PageTranslation
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
     * @return \CoreBundle\Entity\PageTranslation
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
     * Set the value of content.
     *
     * @param string $content
     * @return \CoreBundle\Entity\PageTranslation
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of slug.
     *
     * @param string $slug
     * @return \CoreBundle\Entity\PageTranslation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of locale.
     *
     * @param string $locale
     * @return \CoreBundle\Entity\PageTranslation
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
     * Set Page entity (many to one).
     *
     * @param \CoreBundle\Entity\Page $page
     * @return \CoreBundle\Entity\PageTranslation
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
        return array('Id', 'TranslatableId', 'Label', 'Content', 'Slug', 'Locale');
    }
}
