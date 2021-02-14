<?php

namespace App\Http\Controllers\api\v1\btc;

use App\Interfaces\BtcRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BtcRateController extends Controller
{
    protected $btcRateChecker;

    public function __construct(BtcRate $checker)
    {
        $this->btcRateChecker = $checker;
    }

    public function index()
    {

    }
}
