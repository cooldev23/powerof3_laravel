<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Listing;
use App\Models\ListingMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Listing $listing)
    {
        return view('admin.listings.media.create', compact('listing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Listing $listing)
    {
        // dd($request->all());
        $validated = $request->validate([
            'listing_id' => 'required',
            'type' => 'required',
            // 'media_path' => 'required|mimetypes:video/avi,video/mpeg,image/jpg,image/png,image/jpeg',
            'alt_image_text' => 'required_if:media_type,image'
        ]);

        $request->validate([
            'file', // Confirm the upload is a file before checking its type.
            function ($attribute, $value, $fail) {
                $is_image = Validator::make(
                    ['upload' => $value],
                    ['upload' => 'image']
                )->passes();

                $is_video = Validator::make(
                    ['upload' => $value],
                    ['upload' => 'mimetypes:video/avi,video/mpeg,video/quicktime']
                )->passes();

                if (!$is_video && !$is_image) {
                    $fail(':attribute must be image or video.');
                }
            }
        ]);

        $lm = $listing->media()->create($request->only(['listing_id', 'type', 'is_active', 'is_featured', 'alt_image_text']));

        $path = null;

        $fullFilename = strtolower($request->file('media_path')->getClientOriginalName());

        $path = basename($request->file('media_path')->storeAs('public/images/listing-images/' . $validated['listing_id'], $fullFilename));

        $lm->media_path = $path;
        $lm->save();

        return redirect()->route('admin.listing-media.show', array($listing))->with('status', 'Successfully added media for ' . $listing->address);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListingMedia  $listingMedia
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $listingMedia = $listing->media;
        return view('admin.listings.media.show', compact('listingMedia', 'listing'));
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
