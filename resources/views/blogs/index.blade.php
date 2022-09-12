<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless(count($blogs) == 0)
        
    @foreach($blogs as $blog)
        <x-blogs-card :blogs="$blog"/>
    @endforeach

    @else
        <p>No Blogs Yet!</p>

    @endunless
    </div>

    <div class="mt-6 p-4">
        {{$blogs->links()}}
    </div>
</x-layout>