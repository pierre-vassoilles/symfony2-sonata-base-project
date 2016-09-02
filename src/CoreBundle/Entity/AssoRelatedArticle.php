<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * CoreBundle\Entity\AssoRelatedArticle
 *
 * @ORM\Entity()
 * @ORM\Table(name="asso_related_article", indexes={@ORM\Index(name="fk_article_has_article_article2_idx", columns={"article_id1"}), @ORM\Index(name="fk_article_has_article_article1_idx", columns={"article_id"})})
 */
class AssoRelatedArticle
{
    /**
     * @ORM\Id
     * @ORM\Column(name="article_id", type="integer")
     */
    protected $articleId;

    /**
     * @ORM\Id
     * @ORM\Column(name="article_id1", type="integer")
     */
    protected $articleId1;

    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="assoRelatedArticlesRelatedByArticleId")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=false)
     */
    protected $articleRelatedByArticleId;

    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="assoRelatedArticlesRelatedByArticleId1")
     * @ORM\JoinColumn(name="article_id1", referencedColumnName="id", nullable=false)
     */
    protected $articleRelatedByArticleId1;

    public function __construct()
    {
    }

    /**
     * Set the value of articleId.
     *
     * @param integer $articleId
     * @return \CoreBundle\Entity\AssoRelatedArticle
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Get the value of articleId.
     *
     * @return integer
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set the value of articleId1.
     *
     * @param integer $articleId1
     * @return \CoreBundle\Entity\AssoRelatedArticle
     */
    public function setArticleId1($articleId1)
    {
        $this->articleId1 = $articleId1;

        return $this;
    }

    /**
     * Get the value of articleId1.
     *
     * @return integer
     */
    public function getArticleId1()
    {
        return $this->articleId1;
    }

    /**
     * Set Article related by `article_id` entity (many to one).
     *
     * @param \CoreBundle\Entity\Article $article
     * @return \CoreBundle\Entity\AssoRelatedArticle
     */
    public function setArticleRelatedByArticleId(Article $article = null)
    {
        $this->articleRelatedByArticleId = $article;

        return $this;
    }

    /**
     * Get Article related by `article_id` entity (many to one).
     *
     * @return \CoreBundle\Entity\Article
     */
    public function getArticleRelatedByArticleId()
    {
        return $this->articleRelatedByArticleId;
    }

    /**
     * Set Article related by `article_id1` entity (many to one).
     *
     * @param \CoreBundle\Entity\Article $article
     * @return \CoreBundle\Entity\AssoRelatedArticle
     */
    public function setArticleRelatedByArticleId1(Article $article = null)
    {
        $this->articleRelatedByArticleId1 = $article;

        return $this;
    }

    /**
     * Get Article related by `article_id1` entity (many to one).
     *
     * @return \CoreBundle\Entity\Article
     */
    public function getArticleRelatedByArticleId1()
    {
        return $this->articleRelatedByArticleId1;
    }

    public function __sleep()
    {
        return array('ArticleId', 'ArticleId1');
    }
}
