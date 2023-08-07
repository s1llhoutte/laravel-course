<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CityController extends Controller
{
    public function index() {
        $city = City::find(1);
        dump($city->title);
        dump($city->content);
        dump($city->likes);
        dd($city->is_published);
    }
}
