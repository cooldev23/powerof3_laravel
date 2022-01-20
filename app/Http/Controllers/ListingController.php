<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Listing;
use App\Models\Employee;
use App\Models\ListingType;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::with(['broker', 'type'])->get();

        return view('admin.listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listing = new Listing();
        $brokers = Employee::brokersOnly()->orderBy('first_name')->get();
        $listingTypes = ListingType::all();
        
        return view('admin.listings.create', compact('listing', 'brokers', 'listingTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'employee_id' => 'required|numeric',
            'listing_type' => 'required|numeric',
            'image_path' => 'image',
            'image_alt' => 'required_with:image_path',
            'video' => 'mimetypes:video/avi,video/mpeg'
        ]); 

        $listing = Listing::create($request->only(['address', 'city', 'zip', 'employee_id', 'listing_type', 'bedrooms', 'bathrooms', 'acres', 'price', 'url', 'is_active', 'is_featured', 'description', 'image_alt', 'video_path', 'date_sold', 'sold_price']));

        $path = null;

        if ($request->has('image_path')) {
            $fullFilename = strtolower($validated['image_path']->getClientOriginalName());

            $path = basename($request->file('image_path')->storeAs('public/images/listing-images', $fullFilename));
        }

        $listing->image_path = $path;
        $listing->save();

        return redirect()->route('admin.listings.index')->with('status', 'Successfully created ' . $listing->address);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {        
        $brokers = Employee::brokersOnly()->orderBy('first_name')->get();
        $listingTypes = ListingType::all();

        return view('admin.listings.edit', compact('listing', 'brokers', 'listingTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        // dd($request->all());
        $validated = $request->validate([
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'employee_id' => 'required|numeric',
            'listing_type' => 'required|numeric',
            'image_path' => 'image',
            'image_alt' => 'required_with:image_path',
            'video' => 'mimetypes:video/avi,video/mpeg'
        ]);

        $listing->update($request->only(['address', 'city', 'zip', 'employee_id', 'listing_type', 'bedrooms', 'bathrooms', 'acres', 'price', 'url', 'is_active', 'is_featured', 'description', 'image_alt', 'video_path', 'date_sold']));

        $path = null;

        if ($request->has('image_path')) {
            $fullFilename = strtolower($validated['image_path']->getClientOriginalName());

            $path = basename($request->file('image_path')->storeAs('public/images/listing-images', $fullFilename));
        }

        $listing->image_path = $path;
        $listing->save();

        return redirect()->route('admin.listings.index')->with('status', 'Successfully updated ' . $listing->address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
