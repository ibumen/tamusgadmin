<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of UserDetail
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="userdetail")
 */
class UserDetail {
    /* Constants for Status */

    private $E_STATUS = array("active", "dormant", "not_ready");

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $userDetailId;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="userDetail")
     * @ORM\JoinColumn(name="userid", referencedColumnName="userid", nullable=false, unique=true)
     */
    private $user;

    /**
     * @ORM\Column(name="firstname", type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(name="lastname", type="string", length=30)
     */
    private $lastName;

    /**
     * @ORM\Column(name="othername", type="string", length=30, nullable=true)
     */
    private $otherName;

    /**
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="status", type="string", length=10, options={"default":"active"})
     */
    private $status;

    public function __construct() {
        $this->status="not_ready";
        $this->dateCreated= new \DateTime();
    }
    /**
     * Get userDetailId
     *
     * @return integer 
     */
    public function getUserDetailId()
    {
        return $this->userDetailId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return UserDetail
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return UserDetail
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set otherName
     *
     * @param string $otherName
     * @return UserDetail
     */
    public function setOtherName($otherName)
    {
        $this->otherName = $otherName;

        return $this;
    }

    /**
     * Get otherName
     *
     * @return string 
     */
    public function getOtherName()
    {
        return $this->otherName;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return UserDetail
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return UserDetail
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return UserDetail
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
