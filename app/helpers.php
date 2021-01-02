<?php

use Illuminate\Support\Facades\Route;

if(!function_exists('forsite'))
{
    function forsite($name,$params =[])
    {
        $subsite = Route::current()->parameters()['subsite'];
        $params['subsite'] = $subsite;
        return route($name,$params);
    }
}
