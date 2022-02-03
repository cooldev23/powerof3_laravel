<x-layout>
    <x-card-header class="bg-gray-100 border">
        <a href="{{ route('admin.listing-media.create', array($listing)) }}" class="btn bg-blue-500 hover:bg-blue-700 rounded-sm text-white font-bold p-2 text-sm shadow"><i class="fa fa-plus" aria-hidden="true"></i> Add Media</a>
        <a href="{{ route('admin.listings.index') }}" class="btn bg-gray-500 hover:bg-gray-700 rounded-sm text-white font-bold p-2 text-sm shadow">Return to Listings</a>
    </x-card-header>  
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 bg-white">
                    <x-card-body class="bg-white">
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3 my-3">
                            @foreach ($listingMedia as $lm)
                            <div>
                                <img  class="p-3 w-100" src="{{ asset('storage/images/listing-images/' . $listing->id . '/' . $lm->media_path) }}" alt="{{ $lm->alt_image_text }}">
                                <div class="flex justify-around items-center" x-data="{ isOn: false }">
                                    <livewire:toggle-switch 
                                        :model="$lm"
                                        field="is_active"
                                        word="Active"
                                        :listing="$listing"
                                    />
                                    <livewire:toggle-switch 
                                        :model="$lm"
                                        field="is_featured"
                                        word="Featured"
                                        :listing="$listing"
                                    />
                                    
                                </div>
                                
                            </div>
                            @endforeach
                        </div>
                    </x-card-body>
                </div>
            </div>
        </div>
    </div>
</x-layout>