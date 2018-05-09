<?php
date_default_timezone_set('UTC');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $exampleResponse = file_get_contents(__DIR__ . '/example_responses/sticky_ads_example_1.txt');
    $bidResponse = new \openrtb\BidResponse();
    $bidResponse->hydrate($exampleResponse);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

try {
    $exampleRequest = file_get_contents(__DIR__ . '/example_requests/sticky_ads_example_2.txt');
    $bidRequest = new \openrtb\BidRequest();
    $bidRequest->hydrate($exampleRequest);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

try {
    $bidResponse = new \openrtb\BidResponse();
    $bidResponse->set('id', 'ABC123');
    $bid = new \openrtb\models\Bid();
    $bid->set('id', 'ABC123');
    $bid->set('impid', 'ABC123');
    $bid->set('price', 1.2);
    $seatBid = new \openrtb\models\SeatBid();
    $seatBid->set('bid', array(
        $bid
    ));
    $seats[] = $seatBid;
    $bidResponse->set('seatbid', $seats);
    var_dump($bidResponse->getDataAsJson());
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

//$_SERVER['argv'] = array('phpunit','--configuration=conf.xml');
//$_SERVER['argc'] = count($_SERVER['argv']);
//\PHPUnit_TextUI_Command::main();


//$id = $bidRequest->get('id');
//var_dump($id);
//$imp = $bidRequest->get('imp');
//var_dump($imp[0]->get('id'));
//$site = $bidRequest->get('site');
//var_dump($site);

