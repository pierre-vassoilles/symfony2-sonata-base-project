<?php
/**
 * Created by PhpStorm.
 * User: pvassoilles
 * Date: 15/07/16
 * Time: 10:57
 */

namespace EntityBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\PageBundle\Entity\BaseSnapshot;

/**
 * Class Site
 *
 * @package EntityBundle\Entity
 *
 * @ORM\Entity(repositoryClass="EntityBundle\Entity\Repository\SnapshotRepository")
 * @ORM\Table(name="sonata_snapshot")
 */
class Snapshot extends BaseSnapshot
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Page", inversedBy="snapshots")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $page;


    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Snapshot", inversedBy="children")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\Snapshot", mappedBy="parent")
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