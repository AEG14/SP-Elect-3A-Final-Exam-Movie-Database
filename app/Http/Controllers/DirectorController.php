<?php

namespace App\Http\Controllers;
use App\Models\Director;

use Illuminate\Http\Request;

class DirectorController extends Controller
{
    //
    public function viewSpecificDirector($id) {
        return Director::with('movies')->findOrFail($id);
    }
}
