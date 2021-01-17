<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div>
            <p class="text-lg text-gray-600">{{ $post->extract}}</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- constenido principal--}}
            <div class="col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                </figure>
                <p class="text-lg text-gray-500">{{ $post->body}}</p>
            </div>
            <aside>
                <h1 class="text-2xl text-gray-500 mb-4">Mas en <span class="font-bold">{{ $post->category->name}}</span></h1>
                @foreach ($similares as $similar)
                    <li class="list-none mb-4">
                        <a class="flex" href="{{ route('posts.show',$similar)}}">
                            <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="{{ $similar->name}}">
                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                        </a>
                    </li>
                @endforeach
            </aside>
            
        </div>
    </div>
</x-app-layout>