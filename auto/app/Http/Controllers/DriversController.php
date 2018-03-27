<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 25.03.2018
 * Time: 17:05
 */

namespace App\Http\Controllers;


use App\Driver;
use App\Request;

class DriversController extends Controller
{
    public function index($id)
    {
        $data = [
            'id' => $id,
            'drivers' => $this->getDrivers(),
            'client' => $this->getClient($id)
        ];

        $fp = fopen('drivers.json', 'w');
        fwrite($fp, $data['drivers']);
        fclose($fp);

        if($data['drivers']->isEmpty()) {
            return view('bussy');
        }
        return view('drivers', $data);
    }

    protected function getDrivers()
    {
        return Driver::where('status', 'active')->get();
    }

    protected function getClient($id)
    {
        return Request::where('id', $id)->get()->first();
    }

    public function chooseDriver($id)
    {
        Driver::where('id', request()->input('id'))->update(['status' => 'left']);
        Request::where('id', $id)->update(['status' => 'in work']);

        return redirect('/');
    }
}

