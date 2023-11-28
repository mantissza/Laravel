<x-guest-layout>
    <x-slot name="title">
        {{$post -> title}}
    </x-slot>

    <div class="container mx-auto">
        <h1 class="text-2xl font-medium">{{$post -> title}} </h1>
        Szerző: {{$post -> author -> name}} <br><br>
        {!! str_replace('\n','<br>', $post -> content) !!} <br><br> {{-- ez a csukó nitó nem escapeli a html kódokat --}}


</x-guest-layout>