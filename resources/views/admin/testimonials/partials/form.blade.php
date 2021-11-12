<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Testimonial Information</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="postedBy" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Author
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="postedBy" name="posted_by" value="{{ old('posted_by', $testimonial->posted_by ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="employee">
                Employee
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="employee_id" id="employee" required>
                <option value="">Choose...</option>
                @foreach ($employees as $em)
                    <option value="{{ $em->id  }}" {{ $em->id == old('employee_id', $testimonial->employee_id ?? '') ? 'selected' : '' }}>{{ $em->first_name }} {{ $em->last_name }}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2 relative flex items-center">
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center h-5">
                <input id="isActive" aria-describedby="is_active" name="is_active" type="checkbox" value="1" {{ 1 == old('is_active', $testimonial->is_active ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
            </div>
            <div class="ml-3 text-sm">
                <label for="isActive" class="block uppercase tracking-wide text-gray-700 text-md">Approved Testimonial</label>
            </div>
        </div>
        <div class="mb-4 mx-2 col-span-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="content">
                Content
            </label>
            <textarea class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-blue-500 shadow" rows="10" cols="30" name="content" id="content" placeholder="Testimonial content" >{{ old('content', $testimonial->content ? $testimonial->content : '') }}</textarea>
        </div>
    </div>
</fieldset>

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));
</script>
@endpush