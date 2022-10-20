<x-layout>
    <x-container>
        <x-card-body class="my-4 mx-auto border border-gray-300 bg-white shadow-md max-w-4xl">
            <div class="mb-3">
                <label for="zip" class="block text-sm font-medium text-gray-700">Enter Zip Code</label>
                <div class="mt-1">
                    <input type="text" name="zip" id="zip" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com">
                </div>
            </div>
            <hr>
            <div class="flex">
                <button id="searchBtn" type="button" class="inline-flex items-center rounded border border-transparent bg-blue-500 px-2.5 py-1.5 text-sm font-medium leading-4 text-white shadow-md hover:shadow-none hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Search</button>
            </div>
        </x-card-body>   
    </x-container>
    @push('scripts')
    <script>
        let btn = document.querySelector('#searchBtn');
        let input = document.querySelector('#zip');
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            let zipCode = input.value;
            axios.get('get-listings', {
                params: {
                    zip: zipCode
                }
            })
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                console.log(error);
            })
        })
    </script>
    @endpush
</x-layout>