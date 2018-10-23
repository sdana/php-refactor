<?php

require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('PriceCodes.php');

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        'CHILDRENS', 1
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        'REGULAR', 0
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        'NEW_RELEASE', 2
    ), 5
);

$rental4 = new Rental(
    new Movie(
        'Jurrasic Park',
        'NEW_RELEASE',
        5
    ), 10
);

$customer = new Customer('Joe Schmoe');
// $priceCodes = new PriceCodes();

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);
$customer->addRental($rental4);

echo $customer->statement(false, "NEW_RELEASE", 5, "REGULAR", "CHILDRENS");

echo $customer->htmlStatement(true, "NEW_RELEASE", 5, "REGULAR", "CHILDRENS");
// echo $customer->statement(true);
