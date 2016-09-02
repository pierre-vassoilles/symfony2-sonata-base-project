<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * CoreBundle\Entity\Article
 *
 * @ORM\Entity()
 * @ORM\Table(name="article")
 */
class Article
{
    
    use ORMBehaviors\Translatable\Translatable;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="published_at")
     */
    protected $publishedAt;

    /**
     * @ORM\Column(name="unpublished_at", nullable=true)
     */
    protected $unpublishedAt;

    /**
     * @ORM\Column(name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(name="deleted_at", nullable=true)
     */
    protected $deletedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * @ORM\OneToMany(targetEntity="AssoRelatedArticle", mappedBy="article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=false)
     */
    protected $assoRelatedArticlesRelatedByArticleId;

    /**
     * @ORM\OneToMany(targetEntity="AssoRelatedArticle", mappedBy="article")
     * @ORM\JoinColumn(name="article_id1", referencedColumnName="id", nullable=false)
     */
    protected $assoRelatedArticlesRelatedByArticleId1;

    public function __construct()
    {
        $this->articleTranslations = new ArrayCollection();
        $this->assoRelatedArticlesRelatedByArticleId = new ArrayCollection();
        $this->assoRelatedArticlesRelatedByArticleId1 = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Article
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
     * Set the value of publishedAt.
     *
     * @param  $publishedAt
     * @return \CoreBundle\Entity\Article
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * Get the value of publishedAt.
     *
     * @return 
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * Set the value of unpublishedAt.
     *
     * @param  $unpublishedAt
     * @return \CoreBundle\Entity\Article
     */
    public function setUnpublishedAt($unpublishedAt)
    {
        $this->unpublishedAt = $unpublishedAt;

        return $this;
    }

    /**
     * Get the value of unpublishedAt.
     *
     * @return 
     */
    public function getUnpublishedAt()
    {
        return $this->unpublishedAt;
    }

    /**
     * Set the value of createdAt.
     *
     * @param  $createdAt
     * @return \CoreBundle\Entity\Article
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of createdAt.
     *
     * @return 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of updatedAt.
     *
     * @param  $updatedAt
     * @return \CoreBundle\Entity\Article
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of updatedAt.
     *
     * @return 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of deletedAt.
     *
     * @param  $deletedAt
     * @return \CoreBundle\Entity\Article
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get the value of deletedAt.
     *
     * @return 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set the value of enabled.
     *
     * @param boolean $enabled
     * @return \CoreBundle\Entity\Article
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
     * Add ArticleTranslation entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ArticleTranslation $articleTranslation
     * @return \CoreBundle\Entity\Article
     */
    public function addArticleTranslation(ArticleTranslation $articleTranslation)
    {
        $this->articleTranslations[] = $articleTranslation;

        return $this;
    }

    /**
     * Get ArticleTranslation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticleTranslations()
    {
        return $this->articleTranslations;
    }

    /**
     * Add AssoRelatedArticle related by `article_id` entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\AssoRelatedArticle $assoRelatedArticle
     * @return \CoreBundle\Entity\Article
     */
    public function addAssoRelatedArticleRelatedByArticleId(AssoRelatedArticle $assoRelatedArticle)
    {
        $this->assoRelatedArticlesRelatedByArticleId[] = $assoRelatedArticle;

        return $this;
    }

    /**
     * Get AssoRelatedArticle related by `article_id` entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssoRelatedArticlesRelatedByArticleId()
    {
        return $this->assoRelatedArticlesRelatedByArticleId;
    }

    /**
     * Add AssoRelatedArticle related by `article_id1` entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\AssoRelatedArticle $assoRelatedArticle
     * @return \CoreBundle\Entity\Article
     */
    public function addAssoRelatedArticleRelatedByArticleId1(AssoRelatedArticle $assoRelatedArticle)
    {
        $this->assoRelatedArticlesRelatedByArticleId1[] = $assoRelatedArticle;

        return $this;
    }

    /**
     * Get AssoRelatedArticle related by `article_id1` entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssoRelatedArticlesRelatedByArticleId1()
    {
        return $this->assoRelatedArticlesRelatedByArticleId1;
    }

    public function __sleep()
    {
        return array('Id', 'PublishedAt', 'UnpublishedAt', 'CreatedAt', 'UpdatedAt', 'DeletedAt', 'Enabled');
    }
}
