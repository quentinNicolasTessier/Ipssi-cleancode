<?php

namespace Ipssi;
use Ipssi\BalanceValidator;
class BankAccount {
    /**
     * @var float
     */
    private $balance;
    public function __construct($balance=0){
        $this->setBalance($balance);
    }
    
    /**
     * Increase balance
     * 
     * @param float $balance
     * @return BankAccount
     */
    public function increase(float $balance){
        \Ipssi\BalanceValidator::valid($balance);
        
        $this->balance += $balance;
        return $this;
    }

    /**
     * decrease balance
     * 
     * @param float $balance
     * @return BankAccount
     */
    public function decrease(float $balance){
        \Ipssi\BalanceValidator::valid($balance);
        if ($balance > $this->getBalance()){
            throw new \InvalidArgumentException('balance to be > 0');
        }
        $this->balance += $balance;
        return $this;
    }

    /**
     * Get the value of balance
     *
     * @return  float
     */ 
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set the value of balance
     *
     * @param  float  $balance
     *
     * @return  self
     */ 
    public function setBalance(float $balance)
    {
        $this->balance = $balance;

        return $this;
    }
}

?>