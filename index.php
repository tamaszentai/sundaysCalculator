<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
$entityBody = file_get_contents('php://input');
$object = json_decode($entityBody, true);


function Sundays($input)
{
    if($input == null) {
        throw new Exception("Date field can't be empty!");
    };
    $counter = 0;
    $begin = new DateTime($input);
    $end = new DateTime('today');
    $interval = DateInterval::createFromDateString('1 month');
    $period = new DatePeriod($begin, $interval, $end);
    $stringDate = $begin->format("Y/M/d");

    foreach ($period as $dt) {
        if ($dt->format("l") == "Sunday") {
            $counter++;
        }
    }
    
    echo json_encode($counter);
}

try {
Sundays($object["inputDate"]);
}
catch(Exception $e) {
    echo $e->getMessage();
}

?>