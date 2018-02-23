<?php
namespace Ipssi\Logger\Formatter;
use Ipssi\Logger\Formatter;
class Error implements Formatter
{
    public function format(string $level,string $message,array $context=array()):string{
        $date=(new \Datetime())->format('Y-m-d H:i:s');
        return sprintf('[%s] %s %s',$level,$date,$message);
    }
}


?>