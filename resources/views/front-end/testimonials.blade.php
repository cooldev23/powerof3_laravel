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
                    <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight sm:text-4xl drop-shadow-md proud">PowerOf3 Testimonials</span>
                    </h1>
                    <p class="mt-8 text-xl leading-8">Read the testimonials posted by PowerOf3 real estate satisfied customers.</p>
                </div>
            </div>
        </div>
        @foreach ($testimonials as $testimonial)
        <section class="my-4 border border-gray-200 shadow-md rounded bg-gray-50">
            <blockquote class="mx-auto py-5 text-xl px-10 text-center leading-9">{{ $testimonial->content }}
                <footer class="mt-5 text-center text-base font-medium text-gray-900">&ndash;{{ $testimonial->posted_by }}</footer>
            </blockquote>
        </section>
        @endforeach
    </x-container>
</x-layout>