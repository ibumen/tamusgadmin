<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of State
 *
 * @author contactenesi
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="state")
 */
class State {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue
     */
    private $stateid;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $statename;

    /**
     * Set stateid
     *
     * @param integer $stateid
     * @return State
     */
    public function setStateid($stateid) {
        $this->stateid = $stateid;

        return $this;
    }

    /**
     * Get stateid
     *
     * @return integer 
     */
    public function getStateid() {
        return $this->stateid;
    }

    /**
     * Set statename
     *
     * @param string $statename
     * @return State
     */
    public function setStatename($statename) {
        $this->statename = $statename;

        return $this;
    }

    /**
     * Get statename
     *
     * @return string 
     */
    public function getStatename() {
        return $this->statename;
    }

}
