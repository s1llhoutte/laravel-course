<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPetsController extends Controller
{
    public function pets() {
        return 'my pet\'s is a Chapa';
    }
}
