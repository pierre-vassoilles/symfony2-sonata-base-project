<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * CoreBundle\Entity\ArticleTranslation
 *
 * @ORM\Entity()
 * @ORM\Table(name="article_translation", indexes={@ORM\Index(name="fk_article_translation_article1_idx", columns={"translatable_id"})})
 */
class ArticleTranslation
{

    use ORMBehaviors\Translatable\Translation;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="catch_phrase", type="text", nullable=true)
     */
    protected $catchPhrase;

    /**
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ArticleTranslation
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
     * Set the value of catchPhrase.
     *
     * @param string $catchPhrase
     * @return \CoreBundle\Entity\ArticleTranslation
     */
    public function setCatchPhrase($catchPhrase)
    {
        $this->catchPhrase = $catchPhrase;

        return $this;
    }

    /**
     * Get the value of catchPhrase.
     *
     * @return string
     */
    public function getCatchPhrase()
    {
        return $this->catchPhrase;
    }

    /**
     * Set the value of content.
     *
     * @param string $content
     * @return \CoreBundle\Entity\ArticleTranslation
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
     * Set the value of enabled.
     *
     * @param boolean $enabled
     * @return \CoreBundle\Entity\ArticleTranslation
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get the value of enabled.
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set the value of locale.
     *
     * @param string $locale
     * @return \CoreBundle\Entity\ArticleTranslation
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
     * Set Article entity (many to one).
     *
     * @param \CoreBundle\Entity\Article $article
     * @return \CoreBundle\Entity\ArticleTranslation
     */
    public function setArticle(Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get Article entity (many to one).
     *
     * @return \CoreBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    public function __sleep()
    {
        return array('Id', 'TranslatableId', 'CatchePhrase', 'Content', 'Enabled', 'Locale');
    }
}
