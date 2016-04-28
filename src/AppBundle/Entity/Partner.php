<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of partner
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="partner")
 */
class Partner {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="partnerid", type="integer", nullable=false)
     */
    private $partnerId;

    /**
     * @ORM\Column(name="partnername", type="string", length=150)
     */
    private $partnerName;

    /**
     * @ORM\Column(name="partnersite", type="string", length=100, nullable=true)
     */
    private $partnerSite;

    /**
     * @ORM\Column(name="startofrelation", type="date", nullable=true)
     */
    private $startofrelation;


    /**
     * Get partnerId
     *
     * @return integer 
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * Set partnerName
     *
     * @param string $partnerName
     * @return Partner
     */
    public function setPartnerName($partnerName)
    {
        $this->partnerName = $partnerName;

        return $this;
    }

    /**
     * Get partnerName
     *
     * @return string 
     */
    public function getPartnerName()
    {
        return $this->partnerName;
    }

    /**
     * Set partnerSite
     *
     * @param string $partnerSite
     * @return Partner
     */
    public function setPartnerSite($partnerSite)
    {
        $this->partnerSite = $partnerSite;

        return $this;
    }

    /**
     * Get partnerSite
     *
     * @return string 
     */
    public function getPartnerSite()
    {
        return $this->partnerSite;
    }

    /**
     * Set startofrelation
     *
     * @param \DateTime $startofrelation
     * @return Partner
     */
    public function setStartofrelation($startofrelation)
    {
        $this->startofrelation = $startofrelation;

        return $this;
    }

    /**
     * Get startofrelation
     *
     * @return \DateTime 
     */
    public function getStartofrelation()
    {
        return $this->startofrelation;
    }
}
