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

        // BASE QUERY 
        $query = $business->feedbacks();

        // FILTER (rating + status)
        if ($request->filter === 'positive') {
            $query->where('rating', '>=', 4);
        }

        if ($request->filter === 'negative') {
            $query->where('rating', '<=', 3);
        }

        if ($request->filter === 'new') {
            $query->where('status', 'new');
        }

        if ($request->filter === 'in_progress') {
            $query->where('status', 'in_progress');
        }

        if ($request->filter === 'resolved') {
            $query->where('status', 'resolved');
        }

        // SEARCH
        if ($request->search) {
            $query->where('message', 'like', '%' . $request->search . '%');
        }

        // SORT (default latest)
        if ($request->sort === 'oldest') {
            $query->oldest();
        } elseif ($request->sort === 'highest') {
            $query->orderBy('rating', 'desc');
        } elseif ($request->sort === 'lowest') {
            $query->orderBy('rating', 'asc');
        } else {
            $query->latest();
        }

        // PAGINATION
        $feedbacks = $query->paginate(10)->withQueryString();

        // STATS
        $totalCount = $business->feedbacks()->count();
        $averageRating = $business->feedbacks()->avg('rating');

        $negativeCount = $business->feedbacks()->where('rating', '<=', 3)->count();

        $newCount = $business->feedbacks()->where('status', 'new')->count();
        $inProgressCount = $business->feedbacks()->where('status', 'in_progress')->count();
        $resolvedCount = $business->feedbacks()->where('status', 'resolved')->count();

        $resolutionRate = $totalCount > 0
            ? round(($resolvedCount / $totalCount) * 100)
            : 0;

        $googleClicks = $business->reviewClicks()
            ->where('platform', 'google')
            ->count();

        $naverClicks = $business->reviewClicks()
            ->where('platform', 'naver')
            ->count();

        $totalClicks = $googleClicks + $naverClicks;

        return view('businesses.show', compact(
            'business',
            'feedbacks',
            'totalCount',
            'averageRating',
            'negativeCount',
            'newCount',
            'inProgressCount',
            'resolvedCount',
            'resolutionRate',
            'googleClicks',
            'naverClicks',
            'totalClicks',
        ));
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
