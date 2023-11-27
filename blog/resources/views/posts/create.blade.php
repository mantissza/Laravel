<x-guest-layout>
    <x-slot name="title">
        Új bejegyzés
    </x-slot>

<div class="container mx-auto p-3 overflow-hidden min-h-screen">
    <div class="mb-5">
        <h1 class="font-semibold text-3xl mb-4">Új bejegyzés</h1>
        <p class="mb-2">Ezen az oldalon tudsz új bejegyzést létrehozni.</p>
        <a href="/" class="text-blue-400 hover:text-blue-600 hover:underline"><i class="fas fa-long-arrow-alt-left"></i> Vissza a bejegyzésekhez</a>
    </div>

    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="container mx-auto p-3">
            <div class="flex flex-col">
                <div class="w-full">
                    <label for="name" class="block font-medium text-gray-700">Bejegyzés címe</label>
                    <input
                        type="text"
                        name="title"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    </div>
                <div class="w-full">
                        <label class="block font-medium text-gray-700">Bejegyzés szövege</label>
                    <textarea
                    name="content"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300"></textarea>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-gray-700">Borítókép</label>
                    <input
                        type="file"
                        name="image_file"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300">
                    </div>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-gray-700">Kategóriák</label>
                    @foreach($categories as $c)
                    <div class="flex flex-row pb-1">
                        <input type="checkbox" class="my-0.5 mx-1" name= "categories[]" value="{{$c -> id}}"> <div class="py-0.5 px-1.5 font-semibold text-sm" style="background-color: {{$c -> bg_color}}; color: {{$c -> text_color}};">{{$c -> name}}</div>
                    </div>
                    @endforeach
                </div>
            </div>

        <button type="submit" class="mt-6 bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold px-2 py-1 text-xl">Létrehozás</button>
    </form>
</div>

</x-guest-layout>
