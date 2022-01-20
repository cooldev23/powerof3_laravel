<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Listing Address</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="address" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Street Address
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="address" name="address" value="{{ old('address', $listing->address ?? '' ) }}" required>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="city" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    City
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="city" name="city" value="{{ old('city', $listing->city ?? '' ) }}" required>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="zip" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Zip Code
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="zip" name="zip" value="{{ old('zip', $listing->zip ?? '' ) }}" required>
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Listing Details</legend>
    </div>
    <div class="grid grid-cols-1 grid-flow-row gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="broker">
                Broker
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="employee_id" id="broker" required>
                <option value="">Choose Broker...</option>
                @foreach ($brokers as $broker)
                    <option value="{{ $broker->id  }}" {{ $broker->id == old('broker', $listing->employee_id ?? '') ? 'selected' : '' }}>{{ $broker->first_name }} {{ $broker->last_name }}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="listingType">
                Listing Type
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="listing_type" id="listingType" required>
                <option value="">Choose Type...</option>
                @foreach ($listingTypes as $type)
                    <option value="{{ $type->id  }}" {{ $type->id == old('listing_type', $listing->listing_type ?? '') ? 'selected' : '' }}>{{ ucfirst($type->type) }}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2 property-type">
            <div class="relative">
                <label for="acres" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Acres
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="number" id="acres" name="acres" value="{{ old('acres', $listing->acres ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2 house-type">
            <div class="relative">
                <label for="bedrooms" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Bedrooms
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="number" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $listing->bedrooms ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2 house-type">
            <div class="relative">
                <label for="bathrooms" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Bathrooms
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="number" id="bathrooms" name="bathrooms" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}$" value="{{ old('bathrooms', $listing->bathrooms ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2 relative col-span-2">
            <label for="url" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                URL
            </label> 
            <div class="mt-1 flex rounded-md shadow-sm">
                <input type="url" name="url" id="url" class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" placeholder="https://www.example.com" value="{{ old('url', $partner->url ?? '' ) }}">
            </div>
        </div>
        <div class="mb-4 mx-2 relative">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="listingType">
                Listing Status
            </label>
            <div class="flex flex-col">
                <div class="mb-2 flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <div class="flex items-center h-5">
                        <input id="isActive" aria-describedby="is_active" name="is_active" type="checkbox" value="1" {{ 1 == old('is_active', $listing->is_active ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="isActive" class="block uppercase tracking-wide text-gray-700 text-md">Active Listing</label>
                    </div>
                </div>
                <div class="mb-2 flex items-center">
                    <input type="hidden" name="is_featured" value="0">
                    <div class="flex items-center h-5">
                        <input id="isFeatured" aria-describedby="is_featured" name="is_featured" type="checkbox" value="1" {{ 1 == old('is_featured', $listing->is_featured ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="isFeatured" class="block uppercase tracking-wide text-gray-700 text-md">Featured Listing</label>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="hidden" name="is_sold" value="0">
                    <div class="flex items-center h-5">
                        <input id="isSold" aria-describedby="is_sold" name="is_sold" type="checkbox" value="1" {{ $listing->sold_date ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="isSold" class="block uppercase tracking-wide text-gray-700 text-md">Is Sold</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mb-4 mx-2">
            <div class="relative">
                <label for="price" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Price
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="price" name="price" value="{{ old('price', $listing->price ?? '' ) }}">
            </div>
        </div>
        <fieldset class="sold-details">
            <div class="mb-3 border-b">
                <legend class="text-2xl">Sold Details</legend>
            </div>
            <div class="grid grid-cols-1 grid-flow-row gap-3 sm:grid-cols-2 mb-6">
                <div class="relative mb-4 mx-2">
                    <div class="relative">
                        <label for="dateSold" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                            Date Sold
                        </label> 
                        <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="dateSold" name="date_sold" value="{{ old('date_sold', $listing->date_sold ?? '' ) }}">
                    </div>
                </div>
                <div class="relative mb-4 mx-2">
                    <div class="relative">
                        <label for="soldPrice" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                            Sold Price
                        </label> 
                        <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="soldPrice" name="sold_price" value="{{ old('sold_price', $listing->sold_price ?? '' ) }}">
                    </div>
                </div>
                {{-- <div class="relative mb-4 mx-2">
                    <div class="relative">
                        <label for="represented" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                            Represented
                        </label> 
                        <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="represented" name="represented" value="{{ old('represented', $listing->represented ?? '' ) }}">
                    </div>
                </div> --}}
                <div class="mb-4 mx-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="represented">
                        represented
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="represented" id="represented">
                        <option value="Buyer" {{ !empty($listing->represented) == old('represented', 'Buyer') ? 'selected' : '' }}>Buyer</option> 
                        <option value="Seller" {{ !empty($listing->represented) == old('represented', 'Seller') ? 'selected' : '' }}>Seller</option> 
                        <option value="Both" {{ !empty($listing->represented) == old('represented', 'Both') ? 'selected' : '' }}>Both</option> 
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>
        
        <div class="mb-4 mx-2 col-span-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="listing_description">
                Listing Description
            </label>
            <textarea class="tiny-field p03-form-textarea appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-blue-500 shadow" rows="10" cols="30" name="listing_description" id="listing_description" placeholder="Describe the listing" >{{ old('listing_description', $listing->listing_description ?? '') }}</textarea>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="image" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Listing Image
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="file" accept="image/*" id="image" name="image_path" value="{{ old('image_path', $listing->image_path ?? '') }}" >
            </div>
            @if ($listing->image_path)
                <div class="mt-3 shadow">
                    <img src="{{ asset('storage/images/listing-images/' . $listing->image_path) }}" alt="{{ $listing->image_alt }}">
                </div>
            @endif
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="video" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Listing Video
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="file" accept="video/*" id="video" name="video_path" value="{{ old('video_path', $listing->video_path ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="imageAlt" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Image Alternative Text
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" maxlength="125" id="imageAlt" name="image_alt" value="{{ old('image_alt', $listing->image_alt ?? '') }}" >
            </div>
        </div>
    </div>
</fieldset>

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    let type = document.querySelector('#listingType'),
        typeVal = type.value,
        acreWrap = document.querySelector('.property-type'),
        houseType = document.querySelectorAll('.house-type'),
        soldDetails = document.querySelector('.sold-details'),
        otherCheckboxes = document.querySelectorAll('input:not(#isSold)[type=checkbox]'),
        isSold = document.querySelector('#isSold');

    acreWrap.style.display = 'none';

    type.addEventListener('change', function(e) {
        houseType.forEach(el => {
            el.style.display = 'block';
        });
        acreWrap.style.display = 'none';

        if (e.target.value == 2 ) {
            houseType.forEach(el => {
                el.style.display = 'none';
            });
            acreWrap.style.display = 'block';
        }
    })

    soldDetails.style.display = 'none';

    isSold.addEventListener('click', function(e) {
        if (isSold.checked == true) {
            otherCheckboxes.forEach(el => {
                el.checked = false;
            });

            let date = new Date();
            let lastMonth = date.setMonth(date.getMonth() - 1);
            flatpickr('input[name=date_sold]',{
                disableMobile: true,
                enableTime: false,
                altInput: true,
                altFormat: 'F J, Y',
                dateFormat: 'Y-m-d H:i:S',
                minDate: lastMonth
            });

            soldDetails.style.display = 'block';
        } else {
            soldDetails.style.display = 'none';
        }
    })

    
    autosize(document.querySelectorAll('textarea'));
</script>
@endpush