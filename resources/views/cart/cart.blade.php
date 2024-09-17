<x-layout>
<div>

    @if(session()->has('cart') && count(session('cart')) > 0)
    <div class="border-b py-2">
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Étel neve</th>
                    <th class="px-4 py-2">Egységár</th>
                    <th class="px-4 py-2">Mennyiség</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cart') as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item['name'] }}</td>
                    <td class="border px-4 py-2">{{ $item['price'] }} Ft</td>
                    <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p>A kosár üres.</p>
    @endif
</div>
</x-layout>
