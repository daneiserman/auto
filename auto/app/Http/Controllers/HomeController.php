<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Request;

class HomeController extends Controller {
    public function index()
    {
        $data = [
            'drivers' => $this->getDrivers(),
            'requests' => $this->getRequests()
        ];

        $fp = fopen('requests.json', 'w');
        fwrite($fp, $data['requests']->toJson());
        fclose($fp);

        $fp = fopen('drivers.json', 'w');
        fwrite($fp, $data['drivers']);
        fclose($fp);

        return view('welcome', $data);
    }

    protected function getDrivers()
    {
        return Driver::where('status', 'active')->get();
    }

    protected function getRequests()
    {
        return Request::where('status', 'active')->get();
    }
}