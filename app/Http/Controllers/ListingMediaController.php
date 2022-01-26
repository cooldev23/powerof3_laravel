<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Listing;
use App\Models\ListingMedia;
use Illuminate\Http\Request;

class ListingMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listingMedia = ListingMedia::with('listing')->get();
        return view('admin.listings.media.index', compact('listingMedia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listings = Listing::all();
        
        return view('admin.listings.media.create', compact('listings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'listing_id' => 'required',
            'type' => 'required',
            'media_path' => 'required|mimes:jpg,png,jpeg,mp4,avi',
            'alt_image_text' => 'required_if:media_type,image'
        ]);

        $lm = ListingMedia::create($request->only(['listing_id', 'type', 'is_active', 'is_featured', 'alt_image_text']));

        $path = null;

        $fullFilename = strtolower($validated['media_path']->getClientOriginalName());

        $path = basename($request->file('media_path')->storeAs('public/images/listing-images/' . $validated['listing_id'], $fullFilename));

        $lm->media_path = $path;
        $lm->save();

        return redirect()->route('admin.listing-media.index')->with('status', 'Successfully created ' . $lm->type . ' file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListingMedia  $listingMedia
     * @return \Illuminate\Http\Response
     */
    public function show(ListingMedia $listingMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListingMedia  $listingMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(ListingMedia $listingMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListingMedia  $listingMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListingMedia $listingMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListingMedia  $listingMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListingMedia $listingMedia)
    {
        //
    }
}
