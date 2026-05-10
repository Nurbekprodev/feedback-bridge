<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Feedback;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = auth()->user()->businesses()->latest()->get();

        return view('businesses.index', compact('businesses'));
    }

    public function show(Business $business)
    {
        abort_if($business->user_id !== auth()->id(), 403);

        $feedbacks = $business->feedbacks()->latest()->get();

        return view('businesses.show', compact('business', 'feedbacks'));
    }

    public function create(Business $business){

        return view('businesses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'google_review_url' => ['nullable', 'url'],
            'naver_review_url' => ['nullable', 'url'],
        ]);

        $validated['user_id'] = auth()->id();
        $validated['uuid'] = \Str::uuid();

        Business::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Business created.');
    }

    public function qr(Business $business){
        abort_if($business->user_id !== auth()->id(), 403);

        $url = url('/f/' . $business->uuid);

        $qr = QrCode::format('svg')
            ->size(300)
            ->generate($url);

        return Response::make($qr, 200, [
            'Content-Type' => 'image/svg',
            'Content-Disposition' => 'attachment; filename="qr.svg"',
        ]);
    }
}
