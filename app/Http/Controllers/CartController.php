<?php

namespace App\Http\Controllers;
use App\Models\Dish;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Az azonosító, amit a kérésből kapunk
        $dishId = $request->input('dish_id');
        
        // A Dish modell példányának lekérése
        $dish = Dish::find($dishId);
        
        if (!$dish) {
            return redirect()->back()->withErrors('Egy hiba történt az étel keresése során.');
        }
    
        // Az input mezőkből származó értékek
        $quantity = $request->input('qty'); // A mennyiség
    
        // Kosár hozzáadása a sessionhöz
        $cart = session()->get('cart', []);
        
        // Ha az étel már benne van a kosárban, frissítsük a mennyiséget
        if (isset($cart[$dishId])) {
            $cart[$dishId]['quantity'] += $quantity;
        } else {
            // Egy új étel hozzáadása a kosárhoz
            $cart[$dishId] = [
                'name' => $dish->name,
                'price' => $dish->price,
                'quantity' => $quantity
            ];
        }
    
        // Kosár mentése a sessionbe
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Az étel hozzáadva a kosárhoz!');
    }

    // Other methods for viewing, removing, and updating the cart can be added here
}
