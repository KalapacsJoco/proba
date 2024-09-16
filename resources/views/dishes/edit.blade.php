<x-layout title="Eledel módosítása">





<div>
    @if($errors->any())

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    
    
    
    @endif
</div>

<form action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="mb-4">
        <label for="name" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Étel neve:</label>
        <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-md caret-amber-100 bg-transparent placeholder-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75"  value="{{ $dish->name }}" required>
    </div>
    <div class="mb-4">
        <label for="description" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Leírás:</label>
        <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded-md caret-amber-100 bg-transparent placeholder-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75"  required>{{ $dish->description }}</textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Ár:</label>
        <input type="number" name="price" id="price" step="0.01" class="w-full p-2 border border-gray-300 rounded-md caret-amber-100 bg-transparent placeholder-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75" value="{{ $dish->price }}" required>
    </div>
    <div class="mb-4">
        <label for="image" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Kép feltöltése:</label> <br>
        <div>
            <p>Jelenlegi kép:</p>
            <img src="{{ Storage::url($dish->image) }}" alt="Dish Image" class="w-32 h-32 object-cover">
        </div>
        <div class="relative inline-block">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" ><br>
        </div>
    </div>
    <div class="flex items-center justify-between">
        <input type="submit" class="text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3" value="Módosítás">
    </div>

</form>


</x-layout>