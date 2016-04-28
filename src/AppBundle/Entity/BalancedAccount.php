<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of BalancedAccount
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="balancedaccount")
 */
class BalancedAccount {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $balanceId;

    /**
     * @ORM\Column(name="effective_date", type="datetime", unique=true)
     */
    private $effectiveDate;

    /**
     * @ORM\Column(name="sales_amount", type="decimal", precision=17, scale=4)
     */
    private $salesAmount;

    /*
     * @ORM\Column(name="commission", type="decimal", precision=17, scale=4)

      private $commission;
     */

    /**
     * @ORM\Column(name="agent_commission", type="decimal", precision=17, scale=4)
     */
    private $agentCommission;

    /**
     * @ORM\Column(name="adjusted_sales_amount", type="decimal", precision=17, scale=4)
     */
    private $adjustedSalesAmount;

    /**
     * @ORM\Column(name="balance_date", type="datetime")
     */
    private $balanceDate;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="balancedby", referencedColumnName="userid", nullable=false)
     */
    private $balancedBy;

    /**
     * Get balanceId
     *
     * @return integer 
     */
    public function getBalanceId() {
        return $this->balanceId;
    }

    /**
     * Set effectiveDate
     *
     * @param \DateTime $effectiveDate
     * @return BalancedAccount
     */
    public function setEffectiveDate($effectiveDate) {
        $this->effectiveDate = $effectiveDate;

        return $this;
    }

    /**
     * Get effectiveDate
     *
     * @return \DateTime 
     */
    public function getEffectiveDate() {
        return $this->effectiveDate;
    }

    /**
     * Set salesAmount
     *
     * @param string $salesAmount
     * @return BalancedAccount
     */
    public function setSalesAmount($salesAmount) {
        $this->salesAmount = $salesAmount;

        return $this;
    }

    /**
     * Get salesAmount
     *
     * @return string 
     */
    public function getSalesAmount() {
        return $this->salesAmount;
    }

    /**
     * Set agentCommission
     *
     * @param string $agentCommission
     * @return BalancedAccount
     */
    public function setAgentCommission($agentCommission) {
        $this->agentCommission = $agentCommission;

        return $this;
    }

    /**
     * Get agentCommission
     *
     * @return string 
     */
    public function getAgentCommission() {
        return $this->agentCommission;
    }

    /**
     * Set balanceDate
     *
     * @param \DateTime $balanceDate
     * @return BalancedAccount
     */
    public function setBalanceDate($balanceDate) {
        $this->balanceDate = $balanceDate;

        return $this;
    }

    /**
     * Get balanceDate
     *
     * @return \DateTime 
     */
    public function getBalanceDate() {
        return $this->balanceDate;
    }

    /**
     * Set adjustedSalesAmount
     *
     * @param string $adjustedSalesAmount
     * @return BalancedAccount
     */
    public function setAdjustedSalesAmount($adjustedSalesAmount) {
        $this->adjustedSalesAmount = $adjustedSalesAmount;

        return $this;
    }

    /**
     * Get adjustedSalesAmount
     *
     * @return string 
     */
    public function getAdjustedSalesAmount() {
        return $this->adjustedSalesAmount;
    }


    /**
     * Set balancedBy
     *
     * @param \AppBundle\Entity\User $balancedBy
     * @return BalancedAccount
     */
    public function setBalancedBy(\AppBundle\Entity\User $balancedBy)
    {
        $this->balancedBy = $balancedBy;

        return $this;
    }

    /**
     * Get balancedBy
     *
     * @return \AppBundle\Entity\User 
     */
    public function getBalancedBy()
    {
        return $this->balancedBy;
    }
}
