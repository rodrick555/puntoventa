<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class RoleController extends Controller
{
    public function index()
    {
        return view('dashboard.roles.index');
    }
}
