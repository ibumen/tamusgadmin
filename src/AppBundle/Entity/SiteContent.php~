<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of SiteContent
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="sitecontent")
 */
class SiteContent {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="contentid", type="integer", nullable=false)
     */
    private $contentId;

    /**
     * @ORM\Column(name="contentname", type="string", length=150, unique=true)
     */
    private $contentName;

    /**
     * @ORM\Column(name="contentvalue", type="string", length=1500)
     */
    private $contentValue;


    /**
     * Get contentId
     *
     * @return integer 
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * Set contentName
     *
     * @param string $contentName
     * @return SiteContent
     */
    public function setContentName($contentName)
    {
        $this->contentName = $contentName;

        return $this;
    }

    /**
     * Get contentName
     *
     * @return string 
     */
    public function getContentName()
    {
        return $this->contentName;
    }

    /**
     * Set contentValue
     *
     * @param string $contentValue
     * @return SiteContent
     */
    public function setContentValue($contentValue)
    {
        $this->contentValue = $contentValue;

        return $this;
    }

    /**
     * Get contentValue
     *
     * @return string 
     */
    public function getContentValue()
    {
        return $this->contentValue;
    }
}
