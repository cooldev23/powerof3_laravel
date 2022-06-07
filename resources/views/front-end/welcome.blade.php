<x-layout>
    <x-container>
    <div class="px-5 bg-white">
        <div class="pt-3">
            <img class="hidden lg:block h-32 w-auto mx-auto border-b" src="http://powerof3_laravel.test/storage/images/logo-test2.svg" alt="Power Of 3 Logo">
        </div>
        <div class="py-4 px-16">
            <p class="mb-3">My real estate experience encompasses working with buyers and sellers with varying needs and in all stages of life to include the first time buyer, upsizing, downsizing and building financial wealth through real estate. I pride myself in providing a high level of customer service and grow my business by developing relationships built on trust.</p>
            <p class="mb-3">I provide real estate services to buyers and sellers across all of Northern Colorado to include your primary residence, investment, recreational & commercial properties and land/lots in the mountains and plains.</p>
            <p class="mb-3">As a personable professional, and enthusiastic Realtor, I utilize my negotiating skills and the best networking and marketing available in the industry to meet and exceed YOUR needs.</p>
            <p class="mb-3">It is my pleasure to serve you!</p>
        </div>
        <hr>
        <div class="py-3">
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($employees as $em)
                <li class="col-span-1 flex flex-col text-center bg-white rounded-lg divide-y divide-gray-200 shadow-main">
                    <div class="flex-1 flex flex-col p-8">
                        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="{{ asset('storage/images/employee-images/' . $em->image_path) }}" alt="">
                        <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ $em->fullname }}</h3>
                        <dl class="mt-1 flex-grow flex flex-col justify-between">
                            <dt class="sr-only">Title</dt>
                            <dd class="text-gray-500 text-sm">{{ $em->first_name === 'Cathy' ? 'Owner/' . $em->type->title : $em->type->title }}</dd>
                        </dl>
                        </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="-ml-px w-0 flex-1 flex hover:bg-primary-color">
                                <a href="mailto:{{ $em->email ?? 'cathymontgomeryrealty@gmail.com' }}" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-white">
                                    <!-- Heroicon name: solid/mail -->
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <span class="ml-2">Email</span>
                                </a>
                            </div>
                            <div class="-ml-px w-0 flex-1 flex hover:bg-primary-color">
                                <a href="tel:{{ $em->phone ?? '1+970-797-2132' }}" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-white">
                                    <!-- Heroicon name: solid/phone -->
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    <span class="ml-2">Call</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        </div>
    </x-container>
    <div class="bg-primary-color">
        <div id="word-cloud-wrap" class="px-4 hidden md:flex justify-between items-center">
            <p class="p-4 text-5xl text-center text-white proud">Proudly serving all of Northern Colorado!</p>
            <img src="{{ 'storage/images/word_cloud2.png' }}" class="my-3 w-1/3" alt="Word cloud of Northern Colorado cities">
        </div>
    </div>
    <x-container>
<div class="px-5 bg-white">
    <hr>
    <section aria-labelledby="details-heading">
      <div class="flex flex-col items-center text-center">
        <h2 id="details-heading" class="mt-5 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Featured Listings</h2>
        {{-- <p class="mt-3 max-w-3xl text-lg text-gray-600">Our patented padded snack sleeve construction protects your favorite treats from getting smooshed during all-day adventures, long shifts at work, and tough travel schedules.</p> --}}
      </div>

        <div class="mt-8 grid grid-cols-1 gap-y-16 lg:grid-cols-2 lg:gap-x-8">
            @foreach ($featuredListings as $listing)
            <div>
                {{-- <div class="w-full aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/images/listing-images/' . $listing->image_path) }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="w-full h-full object-center object-cover">
                </div> --}}
                {{-- <ul class="mt-3 text-2xl">
                    <li>{{ $listing->address }}</li>
                    @if (empty($listing->acres))
                        <li>{{ $listing->bedrooms }} Beds/{{ $listing->bathrooms }} Baths</li>
                    @else
                        <li>{{ $listing->acres }} acres</li>
                    @endif
                    <li></li>
                </ul> --}}
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-gray-50">
                    <div class="w-full aspect-w-3 aspect-h-2 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/images/listing-images/' . $listing->image_path) }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="w-full h-full object-center object-cover">
                    </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-xl font-extrabold text-gray-900 sm:text-2xl">{{ $listing->address }}</h2>
                    <p class="mt-1 text-xl text-gray-500">
                        @if (empty($listing->acres))
                        {{ $listing->bedrooms }} Beds/{{ $listing->bathrooms }} Baths
                        @else
                        {{ $listing->acres }} acres
                        @endif
                        <br>
                        {{ $listing->price }}
                    </p>
                    </div>
                </div>
                <div class="mt-5 pb-8 bg-white">
                    <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto">
                        <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                            <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                            <dt class="order-2 text-lg leading-6 font-medium text-gray-500">Photos</dt>
                            {{-- <dd class="order-1 text-5xl font-extrabold text-indigo-600">100%</dd> --}}
                            </div>
                            <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                            <dt class="order-2 text-lg leading-6 font-medium text-gray-500">Videos</dt>
                            {{-- <dd class="order-1 text-5xl font-extrabold text-indigo-600">24/7</dd> --}}
                            </div>
                            <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                            <dt class="order-2 text-lg leading-6 font-medium text-gray-500">I'm Interested</dt>
                            {{-- <dd class="order-1 text-5xl font-extrabold text-indigo-600">100k</dd> --}}
                            </div>
                        </dl>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <div class="mt-4 text-base text-gray-500">{!! $listing->listing_description !!}</div>
            </div>
            @endforeach
      </div>
    </section>
</div>

    
    </x-container>
    <div class="bg-primary-color">
       
    </div>
    <div>
        <div class="grid grid-cols- justify-center bg-gray-100 border-t">
            <div>
                <div class="px-4 py-5 sm:p-6 border-r border-gray-300">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Get In Touch</h3>
                            <p class="mt-1 text-sm text-gray-500">Have a question? Want to list your home? In the market for a commercial or
                    recreational property? Drop us a line! Be sure to visit the <a href="#" class="text-blue-500">Contact</a> page for our office address if you want to stop by!</p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="#" method="POST">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                        <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="6" placeholder="What would you like to say?" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                        {{-- <input type="text" name="message" id="message" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-md-5">
                <blockquote class="blockquote text-center">We highly recommend Cathy to any home buyer/seller
                    for many reasons. During the buying process she kept us in the loop communicating often
                    about what was happening. Cathy is detailed oriented. She is sincerely committed to the best
                    interests of her clients and works hard to make their desires happen!</blockquote>
                <footer class="blockquote-footer text-right px-5">ginnhopp</footer>
            </div>
            <div class="px-4 flex items-center text-center border-r border-gray-300">{{ $testi->content }}</div>
            <div class="flex flex-col justify-center text-center">
                <h4 class="text-3xl">Get Your Free Home Evaluation</h4>
                <div class="text-center my-3">
                    <a href="../Powerof3_w_DB/evaluation.php"><button class="px-3 py-2 bg-primary-color text-white rounded-md">Get Evaluation</button></a>
                </div>
                <p>Let's determine the value of your home!</p>
                <p><small>(no obligation)</small></p>
            </div>
        </div>
    </div>
     {{-- <x-container>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Get In Touch</h3>
            <p class="mt-1 text-sm text-gray-500">Have a question? Want to list your home? In the market for a commercial or recreational property? Drop us a line! Be sure to visit the <a href="#" class="text-blue-500">Contact</a> page for our office address if you want to stop by!</p>
            <div class="grid grid-cols-2 justify-center bg-gray-100 border-red-500 border-t">
                <div class="mt-5 md:mt-0">
                    <form action="#" method="POST">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6">
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea name="message" id="message" cols="30" rows="6" placeholder="What would you like to say?" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                {{-- <input type="text" name="message" id="message" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-container> --}}

@push('scripts')
<script>
// need to figure out looping through a few testimonials
</script>
@endpush
</x-layout>
