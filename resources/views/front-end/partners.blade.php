<x-layout>
    <x-container>
      <div class="relative overflow-hidden text-white bg-primary-color border border-slate-200 shadow-md py-8 rounded">
        <div class="hidden lg:absolute lg:inset-y-0 lg:block lg:h-full lg:w-full lg:[overflow-anchor:none]">
          <div class="relative mx-auto h-full max-w-prose text-lg" aria-hidden="true">
            <svg class="absolute top-12 left-full translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
              <defs>
                <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                  <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
              </defs>
              <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
            </svg>
            <svg class="absolute top-1/2 right-full -translate-y-1/2 -translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
              <defs>
                <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                  <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
              </defs>
              <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
            </svg>
            <svg class="absolute bottom-12 left-full translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
              <defs>
                <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                  <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
              </defs>
              <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
            </svg>
          </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
          <div class="mx-auto max-w-prose text-lg">
            <h1>
              <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight sm:text-4xl drop-shadow-md proud">PowerOf3 Partners</span>
            </h1>
            <p class="mt-8 text-xl leading-8">Below, you will find local businesses and business people that can financially help you get into a home, make sure a potential new home is up to snuff or even provide helpful services once you are in the home.</p>
          </div>
        </div>
      </div>

        <div class="bg-white px-4 pt-6 pb-20 sm:px-6 lg:px-8 lg:pt-12 lg:pb-28">
            <div class="relative mb-5 mx-auto max-w-lg divide-y-2 divide-gray-200 lg:max-w-7xl">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-3xl">Lenders</h2>
                </div>
                <div class="mt-5 grid gap-16 pt-5 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
                    @foreach ($lenders as $lender)
                        <div class="p-3 border shadow rounded">
                            <div class="mb-3">
                                <p class="mb-0 text-xl font-semibold text-gray-900">{{ $lender->business_name }}</p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <p class="text-lg font-medium text-gray-900">{{ $lender->contact_name }}</p>
                                    @if ($lender->contact_title)
                                    <span aria-hidden="true" class="text-lg">&middot;</span>
                                    <p class="text-lg font-medium text-gray-900">{{ $lender->contact_title }}</p>
                                    @endif
                                </div>
                            </div>
                            <ul>
                                <li class="text-base text-gray-500">{{ $lender->contact_email }}</li>
                                <li class="text-base text-gray-500">{{ $lender->phone_numbers }}</li>
                                <li class="text-base text-gray-500">{{ $lender->url }}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="relative mx-auto max-w-lg divide-y-2 divide-gray-200 lg:max-w-7xl">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-3xl">Inspectors</h2>
                </div>
                <div class="mt-5 grid gap-16 pt-5 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
                    @foreach ($inspectors as $inspector)
                        <div class="p-3 border shadow rounded">
                            <div class="mb-3">
                                <p class="text-xl font-semibold text-gray-900">{{ $inspector->business_name }}</p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <p class="text-lg font-medium text-gray-900">{{ $inspector->contact_name }}</p>
                                    @if ($inspector->contact_title)
                                    <span aria-hidden="true" class="text-lg">&middot;</span>
                                    <p class="text-lg font-medium text-gray-900">{{ $inspector->contact_title }}</p>
                                    @endif
                                </div>
                            </div>
                            <ul>
                                <li class="text-base text-gray-500">{{ $inspector->contact_email }}</li>
                                <li class="text-base text-gray-500">{{ $inspector->phone_numbers }}</li>
                                <li class="text-base text-gray-500">{{ $inspector->url }}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>
</x-layout>