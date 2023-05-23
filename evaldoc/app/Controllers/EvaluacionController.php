<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EvaluacionController extends BaseController
{
    public function index()
    {
        return view('evaluacion/index');
    }
}
