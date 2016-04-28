<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of User
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(name="username", type="string", length=30, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(name="pwd", type="string", length=100)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="UserDetail", mappedBy="userId")
     */
    private $userDetail;
    
    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set userDetail
     *
     * @param \AppBundle\Entity\UserDetail $userDetail
     * @return User
     */
    public function setUserDetail(\AppBundle\Entity\UserDetail $userDetail = null)
    {
        $this->userDetail = $userDetail;

        return $this;
    }

    /**
     * Get userDetail
     *
     * @return \AppBundle\Entity\UserDetail 
     */
    public function getUserDetail()
    {
        return $this->userDetail;
    }
}
