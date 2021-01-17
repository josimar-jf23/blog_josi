<x-app-layout>
    <div class="container mt-3">
        <div class="grid sm:grid-cols-1 md:grid-cols-3  gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center bg-white shadow-xl rounded-lg overflow-hidden @if($loop->first) md:col-span-2 @endif" style="background-image: url({{ Storage::url($post->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center gap-1">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a class="inline-block px-3 h-6 rounded-full text-white bg-{{$tag->color}}-600 gap-6" href="{{route('posts.tag',$tag)}}">
                                    {{ $tag->name}}
                                </a>                                
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold" >
                            <a href="{{route('posts.show',$post)}}">{{ $post->name }}</a>
                        </h1>
                    </div>                                                         
                </article>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $posts->links()}}
        </div>  
    </div>
</x-app-layout>