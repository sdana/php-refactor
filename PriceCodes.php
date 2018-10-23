<?php

class PriceCodes
{
    /**
     * @var array
     */
    public $priceCodes = [];

    /**
     * @param string $name
     * @param int $priceCode
     */
    public function __construct()
    {
        require_once('config.php');
        $this->priceCodes = $priceCode;
    }

    /**
     * @return int
     */
    public function getPriceCode($name)
    {
        return $this->priceCodes[$name];
    }
    
    /**
     * @return bool
     */
    public function addPriceCode($name, $code)
    {
        $this->priceCodes[$name] = $code;
        if(isset($this->priceCodes[$name])){
            return true;
        } else {
            return false;
        }
    }    
    
    /**
     * @return bool
     */
    public function removePriceCode($name)
    {
        unset($this->priceCodes[$name]);
        if(!isset($this->priceCodes[$name])){
            return true;
        } else {
            return false;
        }
    }
    
    
}
