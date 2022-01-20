<fieldset>
    <div class="mb-3 border-b">
        <legend class="text-2xl">Employee Information</legend>
    </div>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 mb-6">
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="firstname" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    First Name
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="firstname" name="first_name" value="{{ old('first_name', $employee->first_name ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="lastname" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Last Name
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="lastname" name="last_name" value="{{ old('last_name', $employee->last_name ?? '' ) }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="employeeType">
                Employee Type
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="employee_type_id" id="employeeType" required>
                <option value="">Choose Type...</option>
                @foreach ($employeeTypes as $type)
                    <option value="{{ $type->id  }}" {{ $type->id == old('employee_type_id', $employee->employee_type_id ?? '') ? 'selected' : '' }}>{{ $type->title }}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="email" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Email Address
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="email" id="email" name="email" value="{{ old('email', $employee->email ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="phone" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Phone Number
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="tel" id="phone" name="phone" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}$" value="{{ old('phone', $employee->phone ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2 relative flex items-center">
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center h-5">
                <input id="isActive" aria-describedby="is_active" name="is_active" type="checkbox" value="1" {{ 1 == old('is_active', $employee->is_active ?? '') ? 'checked' : '' }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-500 rounded">
            </div>
            <div class="ml-3 text-sm">
                <label for="isActive" class="block uppercase tracking-wide text-gray-700 text-md">Active Employee</label>
            </div>
        </div>
        <div class="mb-4 mx-2 col-span-2">
            <label class="block uppercase tracking-wide text-gray-700 text-md mb-2" for="bio">
                Employee Bio
            </label>
            <textarea class="tiny-field appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-blue-500 shadow" rows="10" cols="30" name="bio" id="bio" placeholder="Add employee bio" >{{ old('bio', $employee->bio ? $employee->bio : '') }}</textarea>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="image" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Employee Image
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="file" accept="image/*" id="image" name="image_path" value="{{ old('image_path', $employee->image_path ?? '') }}" >
            </div>
        </div>
        <div class="mb-4 mx-2">
            <div class="relative">
                <label for="imageAlt" class="block uppercase tracking-wide text-gray-700 text-md mb-2">
                    Image Alternative Text
                </label> 
                <input class="w-full text-gray-700 border border-gray-400 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" maxlength="125" id="imageAlt" name="image_alt" value="{{ old('image_alt', $employee->image_alt ?? '') }}" >
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