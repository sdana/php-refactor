<?php
require_once('PriceCodes.php');

class Movie
{
    // const CHILDRENS = 2;
    // const REGULAR = 0;
    // const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $movieCodeName;

    /**
     * @var int
     */
    private $priceCode;

    /**
     * @param string $name
     * @param int $priceCode
     */
    public function __construct($name, $movieCodeName, $priceCode)
    {
        $this->name = $name;
        $this->movieCodeName = $movieCodeName;
        $this->priceCode = $priceCode;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function movieCode()
    {
        return $this->movieCodeName;
    }

    /**
     * @return int
     */
    public function priceCode()
    {
        return $this->priceCode;
    }
}
