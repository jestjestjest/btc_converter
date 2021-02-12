<?php
namespace App\Services;

use GuzzleHttp\Client;

class BtcRateChecker
{
    public function getRates()
    {
        return $this->getData();
    }

    private function getData()
    {
        $client = new Client();

        return $client->get('https://blockchain.info/ticker');
    }

    private function addCommission()
    {

    }
}
