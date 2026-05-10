<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function show($uuid)
    {
        $business = Business::where('uuid', $uuid)->firstOrFail();

        return view('feedback.show', compact('business'));
    }

    public function store(Request $request, $uuid){
        // business
        $business = Business::where('uuid', $uuid)->firstOrFail();

        // validate
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:3'],
            'message' => ['required'],
        ]);

        // create feedback
        Feedback::create([
            'business_id' => $business->id,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        // redirect
        return back()->with('success', 'Feedback sent.');
    }

}
