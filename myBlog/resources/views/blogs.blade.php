<h1>
    {{$heading}}
</h1> 

@unless(count($blogs) == 0)
    
@foreach($blogs as $blogs)
    <h2>
        <a href="/blogs/{{$blogs['id']}}">{{$blogs['title']}}</a>
    </h2>
    <p>
        {{$blogs['description']}}</p>
@endforeach

@else
    <p>No Blogs Yet!</p>

@endunless

