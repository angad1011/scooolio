<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Notice;

class BaseController extends Controller
{

    public function __construct()
    {

        $this->middleware(function ($request, $next) {

            $user = Auth::user();
            $roleId = (isset($user)) ? $user->role_id : ''; 
            $instituteId = (isset($user)) ? $user->institute_id : ''; 

          // Conditional query based on the role ID
            if ($roleId == 1) {
                // For role ID 1, show all notices with an empty institut_id
                $notifications = Notice::whereNull('institute_id')->get();
            } else {
                // For other roles, show all noticeList with a non-empty institute_id
                $notifications = Notice::where('institute_id',$instituteId)->get();
            }  

            view()->share('notifications', $notifications);
             return $next($request);
        });

        $currentRoute = Route::current();
        $action = (isset($currentRoute->action['as'])) ? $currentRoute->action['as'] : '';

        // dd($currentRoute->parameterNames);
        $parameteresNames = (!empty($currentRoute->parameterNames)) ? $currentRoute->parameterNames['0'] : '';

        // 
        // dd($currentRoute->parameters);

        // dd($action);
        // $parameteres = (!empty($currentRoute->parameters)) ? $currentRoute->parameters['id'] : '';
        if(isset($currentRoute->parameters['id'])){
            $parameteres = $currentRoute->parameters['id'];
        }else{

            $parameteres = (!empty($parameteresNames)) ? $currentRoute->parameters[$parameteresNames] : '';
        }


        /*Current Page Name*/
        $currentRouteDetails = Route::currentRouteName();
        // dd($currentRouteDetails);
        $currentRouteDetails = explode('.', $currentRouteDetails);
        $currentPage = end($currentRouteDetails); 
        $PageTitle = reset($currentRouteDetails); 
        $PageTitle = str_replace('_', ' ', $PageTitle);
        $currentDate = date('d-m-Y');

        view()->share(['action' => $action,'parameteres' => $parameteres,'currentPage'=>$currentPage,'PageTitle'=>$PageTitle,'parameteresNames'=>$parameteresNames,'currentDate'=>$currentDate]);
    }

}   
