<?php
namespace App\Services;

use App\Interfaces\BtcRate;
use GuzzleHttp\Client;

class BtcRateChecker implements BtcRate
{
    public function getRates()
    {
        $rates = $this->getData();
        return $this->addCommission($rates);
    }

    private function getData(): array
    {
        $client = new Client();
        $response = $client->get('https://blockchain.info/ticker');

        return json_decode($response->getBody()->getContents(), true);
    }

    private function addCommission(array $array): array
    {
        $newArr = [];
        foreach ($array as $key => $item) {
            array_walk($item, function (&$value, $key) {
                if (is_numeric($value)) {
                    $value = bcadd($value , bcmul($value , 0.02), 2);
                }
                return $value;
            });
            $newArr[$key] = $item;
        }
        return $newArr;
    }
}
