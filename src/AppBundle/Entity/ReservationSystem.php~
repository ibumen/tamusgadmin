<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of ReservationSystem
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="reservationsystem")
 */
class ReservationSystem {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="rsid", type="integer", nullable=false)
     */
    private $systemId;

    /**
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $systemName;


    /**
     * Get systemId
     *
     * @return integer 
     */
    public function getSystemId()
    {
        return $this->systemId;
    }

    /**
     * Set systemName
     *
     * @param string $systemName
     * @return ReservationSystem
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;

        return $this;
    }

    /**
     * Get systemName
     *
     * @return string 
     */
    public function getSystemName()
    {
        return $this->systemName;
    }
}
