<?php

namespace Ipssi\service;
use Psr\Container\ContainerInterface;
class Container implements ContainerInterface{
    private $services=[];

    public function get($id){
        if(!$this->has($id)){
            throw new Exception ("service $id does not exists");
        }
        return $this->services[$id]($this);
    }
    public function set($id,callable $service){
            $this->services[$id]=$service;
    }
    public function has($id){
         return array_key_exists($id,$this->services);   
    }
}