<?php
require 'vendor/autoload.php';

$service=new \Ipssi\service\Container();
$service->set('logger.formatter',function(){
    return new \Ipssi\Logger\Formatter\Error;
});
$service->set('logger',function($c){
    $logger = new \Ipssi\Logger\File('app.log');
    $logger->setFormatter($c->get('logger.formatter'));
    return $logger;
});

$service->set('bankAccount',function($c){
    $bankAccount=new \Ipssi\BankAccount(0);
    $bankAccount->increase(100);
    return $bankAccount;
});

$logger=$service->get('bankAccount');

var_dump($logger);

//$logger->emergency('Mon message à logger: {test}', ['test' => "hello"]);

//$service->get('logger')->emergency();
