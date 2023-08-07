<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        $pets = Pet::find(1);
        dump($pets);
    }
}
