<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of CompanyEmail
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="companyemail")
 */
class CompanyEmail {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="emailid", type="integer", nullable=false)
     */
    private $emailId;

    /**
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyContact", inversedBy="emails")
     * @ORM\JoinColumn(name="addrid", referencedColumnName="addrid", nullable=false)
     */
    private $companyAddress;

    /**
     * Get emailId
     *
     * @return integer 
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CompanyEmail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Set companyAddress
     *
     * @param \AppBundle\Entity\CompanyContact $companyAddress
     * @return CompanyEmail
     */
    public function setCompanyAddress(\AppBundle\Entity\CompanyContact $companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return \AppBundle\Entity\CompanyContact 
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }
}
