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

    public function show(Business $business, Request $request)
    {
        abort_if($business->user_id !== auth()->id(), 403);

        $query = $business->feedbacks()->latest();

        if ($request->filter === 'positive') {
            $query->where('rating', '>=', 4);
        }

        if ($request->filter === 'negative') {
            $query->where('rating', '<=', 3);
        }

        $feedbacks = $query->paginate(10)->withQueryString();

        $positiveCount = $business->feedbacks()
            ->where('rating', '>=', 4)
            ->count();

        return view('businesses.show', compact('business', 'feedbacks', 'positiveCount'));
    }

    public function create(){

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
