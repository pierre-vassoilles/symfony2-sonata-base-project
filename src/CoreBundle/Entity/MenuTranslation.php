<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * CoreBundle\Entity\MenuTranslation
 *
 * @ORM\Entity()
 * @ORM\Table(name="menu_translation", indexes={@ORM\Index(name="fk_menu_translation_menu1_idx", columns={"translatable_id"})})
 */
class MenuTranslation
{

    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $label;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\MenuTranslation
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
     * @return \CoreBundle\Entity\MenuTranslation
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
     * Set the value of locale.
     *
     * @param string $locale
     * @return \CoreBundle\Entity\MenuTranslation
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
     * Set Menu entity (many to one).
     *
     * @param \CoreBundle\Entity\Menu $menu
     * @return \CoreBundle\Entity\MenuTranslation
     */
    public function setMenu(Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get Menu entity (many to one).
     *
     * @return \CoreBundle\Entity\Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    public function __sleep()
    {
        return array('Id', 'TranslatableId', 'Label', 'Locale');
    }
}
