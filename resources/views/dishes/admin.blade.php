<x-layout title="Admin page">





<div>
    @if($errors->any())

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    
    
    
    @endif
</div>

<form id="foodForm" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class=" w-full max-w-md mx-auto p-6 text-gray-100 pl-4 border border-gray-100 rounded-lg">
@csrf

    <div class="mb-4">
        <label for="name" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Étel neve:</label>
        <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-md caret-amber-100 bg-transparent placeholder-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75" required>
    </div>
    <div class="mb-4">
        <label for="description" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Leírás:</label>
        <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded-md caret-amber-100 bg-transparent placeholder-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75" required></textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Ár:</label>
        <input type="number" name="price" id="price" step="0.01" class="w-full p-2 border border-gray-300 rounded-md caret-amber-100 bg-transparent placeholder-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75" required>
    </div>
    <div class="mb-4">
        <label for="image" class="w-full p-2 caret-amber-100 bg-transparent placeholder-gray-100">Kép feltöltése:</label> <br>
        <div class="relative inline-block">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        </div>
    </div>
    <div class="flex items-center justify-between">
        <input type="submit" class="text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3" value="Létrehozás">
    </div>

</form>


</x-layout>