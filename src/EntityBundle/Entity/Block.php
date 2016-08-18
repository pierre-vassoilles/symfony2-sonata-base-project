<?php
/**
 * Created by PhpStorm.
 * User: pvassoilles
 * Date: 15/07/16
 * Time: 10:57
 */

namespace EntityBundle\Entity;


use Sonata\PageBundle\Entity\BaseBlock;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Site
 *
 * @package EntityBundle\Entity
 *
 * @ORM\Entity(repositoryClass="EntityBundle\Entity\Repository\BlockRepository")
 * @ORM\Table(name="sonata_block")
 */
class Block extends BaseBlock
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Page", inversedBy="blocks")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $page;


    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Block", inversedBy="children")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\Block", mappedBy="parent")
     */
    protected $children;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}