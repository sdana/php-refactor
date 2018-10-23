<h1>Rental Record for <em><?= $this->name()  ?></em></h1>
<ul>
    <?php foreach ($this->rentals as $rental) : ?>
    <li><?= $rental->movie()->name() ?> - <?= $rental->daysRented() ?></li>
    <?php endforeach; ?>
<ul>
<p>Amount owed is <em><?= $totalAmount ?></em></p>
<p>You earned <em><?= $frequentRenterPoints ?></em> frequent renter points</p>
