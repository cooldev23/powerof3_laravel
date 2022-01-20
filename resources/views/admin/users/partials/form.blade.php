<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">User Information</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="name" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Name
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="name" name="name" value="{{ old('name', $user->name ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="email" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Email
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="email" id="email" name="email" value="{{ old('email', $user->email ?? '' ) }}" >
            </div>
        </div>
    </div>
</fieldset>

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));
</script>
@endpush