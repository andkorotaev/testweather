<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedbackRequest;
use App\Models\Feedback;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CreateFeedbackController extends Controller
{
    /**
     * Show feedback form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('feedback');
    }

    public function create(CreateFeedbackRequest $request)
    {
        Feedback::create($request->all());

        return redirect()->back()->with('success', 'Feedback was send.');
    }
}
