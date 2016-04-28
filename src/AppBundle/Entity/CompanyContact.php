<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of CompanyContact
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="companycontact")
 */
class CompanyContact {

    /**
     * @ORM\Column(name="addrid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $addrId;
    /*
     * @ORM\Column(name="name", type="string", length=150, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(name="address", type="string", length=500)
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(name="stateid", referencedColumnName="stateid", nullable=false)
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="CompanyEmail", mappedBy="companyAddress")
     */
    private $emails;

    /**
     * @ORM\OneToMany(targetEntity="CompanyPhone", mappedBy="companyAddress")
     */
    private $phones;

    public function __construct() {
        $this->emails = new ArrayCollection();
        $this->phones = new ArrayCollection();
    }

    /**
     * Get addrId
     *
     * @return integer 
     */
    public function getAddrId() {
        return $this->addrId;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return CompanyContact
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }


    /**
     * Set state
     *
     * @param \AppBundle\Entity\State $state
     * @return CompanyContact
     */
    public function setState(\AppBundle\Entity\State $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \AppBundle\Entity\State 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Add emails
     *
     * @param \AppBundle\Entity\CompanyEmail $emails
     * @return CompanyContact
     */
    public function addEmail(\AppBundle\Entity\CompanyEmail $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \AppBundle\Entity\CompanyEmail $emails
     */
    public function removeEmail(\AppBundle\Entity\CompanyEmail $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add phones
     *
     * @param \AppBundle\Entity\CompanyPhone $phones
     * @return CompanyContact
     */
    public function addPhone(\AppBundle\Entity\CompanyPhone $phones)
    {
        $this->phones[] = $phones;

        return $this;
    }

    /**
     * Remove phones
     *
     * @param \AppBundle\Entity\CompanyPhone $phones
     */
    public function removePhone(\AppBundle\Entity\CompanyPhone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }
}
