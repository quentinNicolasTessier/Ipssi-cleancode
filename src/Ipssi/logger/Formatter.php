<?php
namespace Ipssi\Logger;

interface Formatter 
{
    public function Format(string $level,string $message,array $context=array()):string;
}
