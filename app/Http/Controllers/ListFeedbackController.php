<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ListFeedbackController extends Controller
{
    /**
     * Show Feedbacks list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Feedback::paginate(10);

        return view('feedback-list', compact('data'));
    }
}
