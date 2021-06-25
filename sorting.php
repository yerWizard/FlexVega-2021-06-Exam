<?php

class ClientPoints
{
    private $id;
    private $points;

    public function __construct($id, $points)
    {
        $this->id = $id;
        $this->points = $points;
    }

    public function __toString()
    {
        return $this->id.' '.$this->points;
    }

    public function getClientPoints()
    {
        return $this->points;
    }
}

$clients = [
    new ClientPoints(uniqid(), 2000),
    new ClientPoints(uniqid(), 1000),
    new ClientPoints(uniqid(), 300),
    new ClientPoints(uniqid(), 500),
    new ClientPoints(uniqid(), 50),
    new ClientPoints(uniqid(), 3000),
    new ClientPoints(uniqid(), 1000),
];


// Do something here to sort the clients descending by their points!
function compare($a,$b)
{
   
    if ($a->getClientPoints() == $b->getClientPoints()) {
        return 0;
    }
    return ($a->getClientPoints() > $b->getClientPoints()) ? -1 : 1;

}

usort($clients, "compare");

foreach($clients as $client){

    print_r($client->getClientPoints());
    echo "<br/>";
}

print_r($clients);
