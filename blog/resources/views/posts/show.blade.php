<x-guest-layout>
    <x-slot name="title">
        {{$post -> title}}
    </x-slot>

    <div class="container mx-auto">
        <h1 class="text-2xl font-medium">{{$post -> title}} </h1>
        Szerző: {{$post -> author -> name}} <br><br>
        {!! str_replace('\n','<br>', $post -> content) !!} <br><br> {{-- ez a csukó nitó nem escapeli a html kódokat --}}

        <form method="POST" action="{{ route('posts.destroy', $post)}}" id="delete-form">
            @csrf 
            @method('DELETE')
        <a href="{{ route('posts.destroy', $post)}}"
        onclick="event.preventDefault(); document.querySelector('#delete-form').submit();" {{-- Ha a gombra kattintok ne kövessük a linket, hanem a delete-form nevű formot küldjük el. --}}
        class="bg-red-500 hover:bg-red-700 px-2 py-1 text-white"><i
            class="fas fa-trash"></i> Törlés</a>
        </form>
</x-guest-layout>