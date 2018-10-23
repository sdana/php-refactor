<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function statement(bool $returnHTML=false)
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = 'Rental Record for ' . $this->name() . PHP_EOL;
        $htmlResult = '<h1>Rental Record for <em>' . $this->name() . '</em></h1>' . PHP_EOL . '<ul>' . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $thisAmount = 0;

            switch($rental->movie()->priceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->daysRented() > 2) {
                        $thisAmount += ($rental->daysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->daysRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($rental->daysRented() > 3) {
                        $thisAmount += ($rental->daysRented() - 3) * 1.5;
                    }
                    break;
            }

            $totalAmount += $thisAmount;

            $frequentRenterPoints++;
            if ($rental->movie()->priceCode() === Movie::NEW_RELEASE && $rental->daysRented() > 1) {
                $frequentRenterPoints++;
            }

            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $thisAmount . PHP_EOL;
            $htmlResult .= '<li> ' . $rental->movie()->name() .' - ' . $thisAmount . '</li>' . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
        $htmlResult .= '</ul>' . PHP_EOL . '<p>Amount owed is <em>' . $totalAmount . '</em></p>' . PHP_EOL;

        $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points' . PHP_EOL;
        $htmlResult .= '<p>You earned <em>' . $frequentRenterPoints . '</em> frequent renter points</p>' . PHP_EOL;

        if ($returnHTML != true)
        {
            return $result;
        }
        else
        {
            return $htmlResult;
        }
    }

    public function htmlStatement()
    {
        $returnHtmlStatement = $this->statement(true);
        return $returnHtmlStatement;
    }
}
