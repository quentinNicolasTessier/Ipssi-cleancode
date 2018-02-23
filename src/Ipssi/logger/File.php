<?php

namespace Ipssi\Logger;
use \Psr\Log\LoggerInterface;

class File implements LoggerInterface
{
    use \Psr\Log\LoggerTrait;
    /**
     * @var string
     */
    private $filename;

     /**
     * @var Formatter
     */
    private $formatter;

    public function __construct(string $filename){
        $this->setFilename($filename);
       
    }
    public function log($level,$message,array $context=array()){
        $fmt= $this->formatter->format($level,Message::interpolate($message,$context));
        return file_put_contents(
            $this->getFilename(),
            $fmt.PHP_EOL,
            FILE_APPEND
        );
    }
    

    /**
     * Get the value of filename
     *
     * @return  string
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @param  string  $filename
     *
     * @return  self
     */ 
    public function setFilename(string $filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the value of formatter
     *
     * @return  Formatter
     */ 
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * Set the value of formatter
     *
     * @param  Formatter  $formatter
     *
     * @return  self
     */ 
    public function setFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;

        return $this;
    }
}

?>