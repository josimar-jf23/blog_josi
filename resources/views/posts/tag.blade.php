<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8  mt-3">
        <div class="py-4">
            <h1 class="text-4xl text-gray-600 leading-8 font-bold text-center mb-8">Etiqueta: {{$tag->name}}</h1>
            @foreach ($posts as $post)
                <x-card-post :post="$post"/>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $posts->links()}}
        </div>  
    </div>
</x-app-layout>