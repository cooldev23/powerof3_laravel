<x-layout>
    <x-container>
        <x-form method="PUT" action="{{ route('admin.employees.update', array($employee)) }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto w-full lg:w-2/3 border">
            <div class="w-full max-w-3xl mx-auto">
                @include('admin.employees.partials.form')
            </div>
        </x-form>
        <hr>
        <div class="mt-4 flex justify-start">
            <input type="submit" value="Update" id="saveBtn" class="bg-blue-500 border border-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
            <a class="bg-transparent hover:bg-gray-400 text-gray-700 font-semibold hover:text-white hover:border-gray-300 py-2 px-4 border border-gray-500 hover:border-transparent rounded ml-2" href="{{ url()->previous() !== url()->current() ? url()->previous() : route('status.index') }}">Cancel</a>
        </div>
    </x-container>
</x-layout>