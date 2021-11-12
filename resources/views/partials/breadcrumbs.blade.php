<div class="border-b border-gray-200 bg-white shadow-inner p-4">
    <div class="container max-w-7xl mx-auto px-10">
        <ul class="inline-block text-sm">
        @foreach (Breadcrumbs::current() as $crumbs)
        @if ($crumbs->url() && !$loop->last)
            <li class="inline-block">
                <a href="{{ $crumbs->url() }}" class="underline">
                    {{ $crumbs->title() }} 
                </a>
            </li>
            <span class='text-gray-400 font-semibold'> &nbsp;&sol;&nbsp; </span>
        @else
            <li class="inline-block active">
                <strong>{{ $crumbs->title() }}</strong>
            </li>
        @endif
        @endforeach 
        </ul>
    </div>
</div>