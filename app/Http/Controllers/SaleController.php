<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\ProductPurchased;
use App\Notifications\HardcodedNotification;

class SaleController extends Controller
{

    public function index(Request $request)
    {
        $query = Sale::where('isSold', false)->with('category', 'user');
        
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        
        $sales = $query->paginate(3);
        $categories = Category::all();
        
        return view('sales.index', compact('sales', 'categories'));
    }
    public function mine()
    {
        $sales = Sale::where('user_id', Auth::id())->with('category')->get();
        return view('sales.mine', compact('sales'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('sales.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $maxImages = 5;
        $request->validate([
            'product' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images' => "array|max:$maxImages",
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sale = Sale::create([
            'product' => $request->product,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'isSold' => false,
            // No se asigna 'img' aquí, se actualizará luego si se sube algún archivo
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            // Si se envían varias imagenes, asigna la primera al campo 'img'
            $firstImage = array_shift($images);
            $firstPath = $firstImage->store('images', 'public');

            // Actualiza el campo 'img' de la venta con la ruta de la primera imagen
            $sale->update(['img' => $firstPath]);

            Image::create([
                'sale_id' => $sale->id,
                'route' => $firstPath,
            ]);

            // Guarda las imágenes restantes, si existen
            foreach ($images as $image) {
                $path = $image->store('images', 'public');
                Image::create([
                    'sale_id' => $sale->id,
                    'route' => $path,
                ]);
            }
        }
        return redirect()->route('sales.index')->with('success', 'Anuncio creado exitosamente.');
    }

    public function show($id)
    {
        $sale = Sale::with('category', 'user', 'images')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $categories = Category::all();
        return view('sales.edit', compact('sale', 'categories'));
    }



    public function sell($id, $buyer)
    {
        $sale = Sale::findOrFail($id);
        $sale->update(['isSold' => true, 'buyerId' => $buyer]);
    
        // Obtener la instancia del vendedor a partir del id del usuario
        $seller = User::find($sale->user_id);
        
        // Verifica que $sale sea una instancia de Sale antes de notificar
        $seller->notify(new ProductPurchased($sale));
    
        return redirect()->route('sales.index')->with('success', 'El producto ha sido marcado como vendido.');
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $maxImages = 5;
        $request->validate([
            'product' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images' => "array|max:$maxImages",
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sale->update([
            'product' => $request->product,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                Image::create([
                    'sale_id' => $sale->id,
                    'route' => $path,
                ]);
            }
        }

        return redirect()->route('sales.index')->with('success', 'Anuncio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Anuncio eliminado exitosamente.');
    }


   
    public function activate($id)
    {
        $sale = Sale::findOrFail($id);
        // Verifica que el usuario actual sea el propietario del anuncio
        if ($sale->user_id !== Auth::id()) {
            abort(403);
        }
        // Reactivar el anuncio: marcar isSold como false y limpiar buyerId
        $sale->update([
            'isSold' => false,
            'buyerId' => null,
        ]);
    
        return redirect()->back()->with('success', 'El producto ha sido reactivado exitosamente.');
    }
}