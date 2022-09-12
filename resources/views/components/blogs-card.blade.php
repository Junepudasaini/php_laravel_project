@props(['blogs'])


<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$blogs->logo ? asset('storage/' . $blogs->logo) : asset('/images/no-image.png')}}"alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/blogs/{{$blogs->id}}">{{$blogs["title"]}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$blogs->company}}</div>
            <x-blogs-tag :tagsCsv="$blogs->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{$blogs->location}}
            </div>
        </div>
    </div>
</x-card>