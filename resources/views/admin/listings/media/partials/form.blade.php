<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Media Information</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="listingId">
                Listing
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="listing_id" id="listingId" required>
                <option value="">Choose Listing...</option>
                @foreach ($listings as $l)
                    <option value="{{ $l->id  }}" {{ $l->id == old('listing_id', $lm->id ?? '') ? 'selected' : '' }}>{{ $l->address }}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="mediaType">
                Media Type
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="type" id="mediaType" required>
                <option value="">Choose Type...</option>
                    <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="media" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Media
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-1 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="file" accept="image/*, video/mp4, video/x-m4v, video/avi" id="media" name="media_path" value="{{ old('media_path', $lm->media_path ?? '') }}" required>
            </div>
            {{-- @if ($lm->media_path)
                <div class="mt-3 shadow">
                    <img src="{{ asset('storage/images/listing-images/' . $lm->media_path) }}" alt="{{ $lm->alt_image_text }}">
                </div>
            @endif --}}
        </div>
        <div class="mb-4 mx-2 relative">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                Media Status
            </label>
            <div class="flex flex-col">
                <div class="mb-2 flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <div class="flex items-center h-5">
                        <input id="isActive" aria-describedby="is_active" name="is_active" type="checkbox" value="1" {{ 1 == old('is_active', $lm->is_active ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="isActive" class="block uppercase tracking-wide text-gray-700 text-md">Active</label>
                    </div>
                </div>
                <div class="mb-2 flex items-center">
                    <input type="hidden" name="is_featured" value="0">
                    <div class="flex items-center h-5">
                        <input id="isFeatured" aria-describedby="is_featured" name="is_featured" type="checkbox" value="1" {{ 1 == old('is_featured', $lm->is_featured ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="isFeatured" class="block uppercase tracking-wide text-gray-700 text-md">Featured</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="imageAlt" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Image Alternative Text
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" maxlength="125" id="imageAlt" name="alt_image_text" value="{{ old('alt_image_text', $lm->alt_image_text ?? '') }}" >
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
   
    
    
</fieldset>

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));

    let altText = document.querySelector('#imageAlt');
    let mediaType = document.querySelector('#mediaType');

    mediaType.addEventListener('change', function() {
        let val = this.value;
        altText.removeAttribute('required');
        if (val === 'image') {
            altText.setAttribute('required', '');
        }
    });

</script>
@endpush