<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Agent
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="agent")
 */
class Agent {
    /* Constants for Status */

    const STATUS = array("active", "dormant");

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="agentid", type="integer", nullable=false)
     */
    private $agentId;

    /**
     * @ORM\Column(name="regno", type="string", length=5, unique=true)
     */
    private $regNo;

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
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(name="mobile", type="string", length=20, nullable=true)
     */
    private $mobile;

    /**
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="status", type="string", length=10, options={"default":"active"})
     */
    private $status;

    public function __construct() {
        $this->status = "active";
        $this->dateCreated= new \DateTime();
    }
    /**
     * Get agentId
     *
     * @return integer 
     */
    public function getAgentId() {
        return $this->agentId;
    }

    /**
     * Set regNo
     *
     * @param string $regNo
     * @return Agent
     */
    public function setRegNo($regNo) {
        $this->regNo = $regNo;

        return $this;
    }

    /**
     * Get regNo
     *
     * @return string 
     */
    public function getRegNo() {
        return $this->regNo;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Agent
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Agent
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set otherName
     *
     * @param string $otherName
     * @return Agent
     */
    public function setOtherName($otherName) {
        $this->otherName = $otherName;

        return $this;
    }

    /**
     * Get otherName
     *
     * @return string 
     */
    public function getOtherName() {
        return $this->otherName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Agent
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Agent
     */
    public function setMobile($mobile) {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile() {
        return $this->mobile;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Agent
     */
    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated() {
        return $this->dateCreated;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Agent
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus() {
        return $this->status;
    }

    public function getAgentFullName($format = "S, f o") {
        $format_arr = str_split($format);
        $output = "";
        foreach ($format_arr as $ch) {
            switch ($ch) {
                case "S": {
                        $output.=strtoupper($this->getLastName());
                        break;
                    }
                case "s": {
                        $output.=ucfirst(strtolower($this->getLastName()));
                        break;
                    }
                case "F": {
                        $output.=strtoupper($this->getFirstName());
                        break;
                    }
                case "f": {
                        $output.=ucfirst(strtolower($this->getFirstName()));
                        break;
                    }
                case "O": {
                        $output.=strtoupper($this->getOtherName());
                        break;
                    }
                case "o": {
                        $output.=ucfirst(strtolower($this->getOtherName()));
                        break;
                    }
                default: {
                        $output.=$ch;
                    }
            }
        }
        return $output;
    }
    
    public function __toString() {
        return $this->getAgentFullName();
    }

}
