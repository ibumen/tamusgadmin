<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Description of User
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable {

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
     * @ORM\OneToOne(targetEntity="UserDetail", mappedBy="user")
     */
    private $userDetail;

    public function __construct() {
        $this->password = password_hash("default", PASSWORD_BCRYPT, ["cost" => 12]);
    }

    public function toggleStatus() {
        if ($this->getUserDetail()->getStatus() == "active") {
            $this->getUserDetail()->setStatus("dormant");
        } else if ($this->getUserDetail()->getStatus() == "dormant") {
            $this->getUserDetail()->setStatus("active");
        } else {
            return false;
        }
        return true;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set userDetail
     *
     * @param \AppBundle\Entity\UserDetail $userDetail
     * @return User
     */
    public function setUserDetail(\AppBundle\Entity\UserDetail $userDetail = null) {
        $this->userDetail = $userDetail;

        return $this;
    }

    /**
     * Get userDetail
     *
     * @return \AppBundle\Entity\UserDetail 
     */
    public function getUserDetail() {
        return $this->userDetail;
    }

    public function getUserFullName($format = "S, f o") {
        $format_arr = str_split($format);
        $output = "";
        foreach ($format_arr as $ch) {
            switch ($ch) {
                case "S": {
                        $output.=strtoupper($this->getUserDetail()->getLastName());
                        break;
                    }
                case "s": {
                        $output.=ucfirst(strtolower($this->getUserDetail()->getLastName()));
                        break;
                    }
                case "F": {
                        $output.=strtoupper($this->getUserDetail()->getFirstName());
                        break;
                    }
                case "f": {
                        $output.=ucfirst(strtolower($this->getUserDetail()->getFirstName()));
                        break;
                    }
                case "O": {
                        $output.=strtoupper($this->getUserDetail()->getOtherName());
                        break;
                    }
                case "o": {
                        $output.=ucfirst(strtolower($this->getUserDetail()->getOtherName()));
                        break;
                    }
                default: {
                        $output.=$ch;
                    }
            }
        }
        return $output;
    }

    public function getSalt() {
        return null;
    }

    public function getRoles() {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials() {
        
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->userId,
            $this->username,
            $this->password,
// see section on salt below
// $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
                $this->userId,
                $this->username,
                $this->password,
// see section on salt below
// $this->salt
                ) = unserialize($serialized);
    }

}
