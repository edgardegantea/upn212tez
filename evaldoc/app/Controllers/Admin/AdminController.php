<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "admin") {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function index()
    {
        return view('admin/dashboard');
    }
}
