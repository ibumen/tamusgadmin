<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of MailingList
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="mailing_list")
 */
class MailingList {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $subscriptionId;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(name="date_joined", type="date")
     */
    private $dateJoined;


    /**
     * Get subscriptionId
     *
     * @return integer 
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MailingList
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return MailingList
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
     * Set dateJoined
     *
     * @param \DateTime $dateJoined
     * @return MailingList
     */
    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;

        return $this;
    }

    /**
     * Get dateJoined
     *
     * @return \DateTime 
     */
    public function getDateJoined()
    {
        return $this->dateJoined;
    }
}
