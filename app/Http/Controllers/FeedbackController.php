<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Feedback;
use App\Notifications\FeedbackNotification;
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
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'message' => ['nullable', 'string'],
        ]);

        
        // create feedback
        $feedback = Feedback::create([
            'business_id' => $business->id,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        if ($business->user && $request->rating <= 3) {
            $business->user->notify(
                new FeedbackNotification($feedback)
            );
        }

        // redirect
        return back()->with('success', 'Feedback sent.');
    }

    public function updateStatus(Request $request, Feedback $feedback)
    {
        abort_if($feedback->business->user_id !== auth()->id(), 403);

        $request->validate([
            'status' => ['required', 'in:new,in_progress,resolved'],
        ]);

        $feedback->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status updated.');
    }
}
