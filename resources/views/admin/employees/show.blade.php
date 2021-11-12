<x-layout>
    <x-container maxWidth="max-w-4xl">
        <x-card-header class="bg-gray-100"></x-card-header>
        <x-card-body class="bg-white p-3">
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                <img class="mx-auto block h-60 w-auto rounded shadow" src="{{ asset('storage/images/employee-images/' . $employee->image_path) }}" alt="{{ $employee->image_alt }}">
                <div>
                    <ul class="list-none">
                        <li><strong>Name: </strong> {{ $employee->first_name }} {{ $employee->last_name }}</li>
                        <li><strong>Email: </strong> {{ $employee->email }}</li>
                        <li><strong>Title: </strong> {{ $employee->first_name == 'Cathy' ? 'Owner/' . $employee->type->title : $employee->type->title }}</li>
                        <li><strong>Phone: </strong> {{ $employee->phone }}</li>
                    </ul>
                </div>
                <textarea class="col-span-2 rounded" cols="30" rows="3">{!! $employee->bio !!}</textarea>
            </div>
        </x-card-body>
        
    </x-container>

@push('scripts')
<script src="/js/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));
</script>
@endpush
</x-layout>

