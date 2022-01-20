<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerType;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::with('type')->get();

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner = new Partner();
        $partnerTypes = PartnerType::all();
        
        return view('admin.partners.create', compact('partner', 'partnerTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'email:filter,rfc',
            'url' => 'url|nullable'
        ]);

        $partner = Partner::create($request->only(['business_name', 'partner_type', 'contact_name', 'url', 'phone_numbers', 'is_active', 'contact_email', 'contact_title', 'description']));

        return redirect()->route('admin.partners.index')->with('status', 'Successfully added Partner ' . $partner->business_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $partnerTypes = PartnerType::all();
        
        return view('admin.partners.edit', compact('partner', 'partnerTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'business_name' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'email:filter,rfc',
            'url' => 'url|nullable'
        ]);

        $partner->update($request->only(['business_name', 'partner_type', 'contact_name', 'url', 'phone_numbers', 'is_active', 'contact_email', 'contact_title', 'description']));

        return redirect()->route('admin.partners.index')->with('status', 'Successfully updated Partner ' . $partner->business_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
