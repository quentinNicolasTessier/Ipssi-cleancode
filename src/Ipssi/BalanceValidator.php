<?php
namespace Ipssi;
    class BalanceValidator 
    {
        public static function valid (float $balance){
            if($balance <=0){
                throw new \InvalidArgumentException("balance has to be > 0");
                
            }
        }
    }
    
?>