<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Business Information</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="businessName" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Business Name
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="businessName" name="business_name" value="{{ old('business_name', $partner->business_name ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2 relative flex items-center">
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center h-5">
                <input id="isActive" aria-describedby="is_active" name="is_active" type="checkbox" value="1" {{ 1 == old('is_active', $partner->is_active ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
            </div>
            <div class="ml-3 text-sm">
                <label for="isActive" class="block uppercase tracking-wide text-gray-700 text-md">Approved Partner</label>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="employee">
                Partner Type
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="partner_type" id="employee" required>
                <option value="">Choose Type...</option>
                @foreach ($partnerTypes as $pt)
                    <option value="{{ $pt->id  }}" {{ $pt->id == old('partner_type', $partner->partner_type ?? '') ? 'selected' : '' }}>{{ ucfirst($pt->type) }}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2 relative">
            <label for="url" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                URL
            </label> 
            <div class="mt-1 flex rounded-md shadow-sm">
                <input type="url" name="url" id="url" class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" placeholder="https://www.example.com" value="{{ old('url', $partner->url ?? '' ) }}">
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Contact Information</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="contactName" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Contact Name
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="contactName" name="contact_name" value="{{ old('contact_name', $partner->contact_name ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="contactTitle" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Contact Title
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="contactTitle" name="contact_title" value="{{ old('contact_title', $partner->contact_title ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="contactEmail" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Contact Email
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="email" id="contactEmail" name="contact_email" value="{{ old('contact_email', $partner->contact_email ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="phoneNumber" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Phone Number
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="tel" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}$" id="phoneNumber" name="phone_numbers" value="{{ old('phone_numbers', $partner->phone_numbers ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2 col-span-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="description">
                Description <small>(optional)</small>
            </label>
            <textarea class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-blue-500 shadow" rows="10" cols="30" name="description" id="description" placeholder="Partner description" >{{ old('description', $partner->description ? $partner->description : '') }}</textarea>
        </div>
    </div>
</fieldset>

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));
</script>
@endpush