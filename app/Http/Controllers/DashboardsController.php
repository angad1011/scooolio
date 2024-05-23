<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Students;

class DashboardsController extends BaseController
{
    public function index(){
        $instituteId = Auth::user()->institute_id;

        $parentMenu = '';
        $pageTitle = 'Dashboard';

        /*Teacher Count*/
        $teachers = Teacher::all()->where('institute_id', $instituteId);

        /*Student Count*/
        $Students =  Students::all()->where('institute_id', $instituteId);


        return view('dashboards.index',compact('parentMenu','pageTitle','teachers','Students'));
    }
}
