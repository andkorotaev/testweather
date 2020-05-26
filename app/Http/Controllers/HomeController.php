<?php

namespace App\Http\Controllers;

use App\Services\Weather\Weather;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show weather.
     *
     * @param Weather $weather
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Weather $weather)
    {
        $weatherHtml = $weather->getHtml();
        $weatherStyles = $weather->getStyles();

        return view('home', compact(['weatherHtml', 'weatherStyles']));
    }
}
