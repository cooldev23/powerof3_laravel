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
            <textarea class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-blue-500 shadow" rows="10" cols="30" name="bio" id="bio" placeholder="Describe the issue" >{{ old('bio', $employee->bio ? $employee->bio : '') }}</textarea>
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
{{-- <div class="mb-6">
    <label for="status" class="uppercase tracking-wide text-gray-700 text-md font-bold mb-2">
        Status <span class="lowercase font-normal"><small>(e.g. open, closed, tree trimming, etc.)</small></span>
    </label> 
    <input class="w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" type="text" id="status" name="status" value="{{ old('status', !empty($status->status) ? $status->status : '') }}" >
</div>
<div class="mb-4">
    <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-message">
        Message
    </label>
    <textarea class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-blue-500 shadow" rows="10" cols="30" name="message" id="grid-message" placeholder="Describe the issue" >{{ old('message', !empty($status->message) ? $status->message : '') }}</textarea>
</div>
<input type="checkbox" id="endDateToggle" class="mr-2" {{ (!empty($status->end_date) && strtotime($status->end_date) >= time()) ? 'checked' : '' }}>
<label class="inline-block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="endDateToggle">
    End Date
</label>
<div id="endDate" class="mb-6">
    <input type="text" value="{{ old('end_date', !empty($status->end_date) ? $status->end_date : '') }}" name="end_date" id="grid-end-date" class="w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:border-blue-500 shadow" placeholder="Select Date">
</div>
<div class="mb-4" id="sendNotificationWrap">
    <input type="checkbox" id="sendNotification" name="send_notification" class="mr-2">
    <label class="inline-block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="sendNotification">
        Send Notification
    </label>
    <p id="subscriberListName" class="bg-yellow-200 p-2 rounded-sm"><i class="fa fa-info-circle" aria-hidden="true"></i> Notification will be sent to <span id="listName" class="font-bold"></span> subscriber list</p>
</div>
<hr>
<div class="mt-4 flex justify-end">
    <a class="bg-transparent hover:bg-gray-400 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-2" href="{{ url()->previous() !== url()->current() ? url()->previous() : route('status.index') }}">Cancel</a>
    <input type="submit" value="Save" id="saveBtn" class="bg-blue-500 border border-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
</div>

@if (!empty($status->sent_at))
<p class="text-right mt-2 text-sm text-gray-700 font-bold">Notification Sent: {{ date('F jS', strtotime($status->sent_at)) }}</p>
@endif --}}

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));
</script>
@endpush