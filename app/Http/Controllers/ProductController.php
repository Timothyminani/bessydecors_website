<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{


public function index()
{
    $products = Product::orderBy('id', 'desc')->get();

    return inertia('Admin/Products', [
        'products' => $products
    ]);
}




public function ShowHome()
{
    
    $featuredProducts = Product::where('featured', 1)
                               ->take(10)
                               ->get();

    return inertia('Home', [
        'featuredProducts' => $featuredProducts
    ]);
}


public function ShowProducts(Request $request)
{
     $search = $request->query('search');
    $category = $request->query('category'); 

    $query = Product::orderBy('id', 'desc');

    if ($category) {
        $query->where('category', $category);
    }
   
 if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%'.$search.'%')
              ->orWhere('tags', 'like', '%'.$search.'%')
              ->orWhere('description', 'like', '%'.$search.'%');
        });
    }



    $All_products = $query->paginate(12)->withQueryString();

    return inertia('Products/All_products', [
        'All_products' => $All_products,
        'selectedCategory' => $category,
         'searchTerm' => $search,
        'categories' => [
            'Living Room',
            'Bedroom',
            'Dining',
            'Kitchen',
            'Office',
            'Outdoor',
            'Kids',
            'Home Décor & Storage',
        ],
    ]);
}



public function ShowSingleProduct($id)
{
    $product = Product::findOrFail($id);


 // Get related products by same category, excluding the current one
    $related = Product::where('category', $product->category)
        ->where('id', '!=', $product->id)
        ->take(6) // limit to 6 items
        ->get();



    return inertia('Products/Single_product', [
        'product' => $product,
         'related' => $related
    ]);
}












public function store(Request $request)
{

   


    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'status' => 'required|string|in:Available,Out of Stock,Archived',
        // FIXED → remove boolean validation
        // 'featured' => 'boolean',
        'tags' => 'nullable|string',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:10240', // 10240 KB = 10 MB,
    ]);

   $paths = [];
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $file) {
        // Generate a unique filename
        $filename = time() . '_' . $file->getClientOriginalName();
        // Move file to public/storage/products
        $file->move(public_path('storage/products'), $filename);
        // Save relative path for database
        $paths[] = 'products/' . $filename;
    }
}


    Product::create([
        'name' => $request->name,
        'category' => $request->category,
        'description' => $request->description,
        'price' => $request->price,
        'discount' => $request->discount,
        'status' => $request->status,

        // This works perfectly
        'featured' => $request->boolean('featured'),

        // Tags saved as array
        'tags' => $request->tags ? array_map('trim', explode(',', $request->tags)) : null,

        'image_1' => $paths[0] ?? null,
        'image_2' => $paths[1] ?? null,
        'image_3' => $paths[2] ?? null,
    ]);

    return back()->with('success', 'Product added successfully');
}








 


public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'status' => 'required|in:Available,Out of Stock,Archived',
        'tags' => 'nullable|string',
        'featured' => 'nullable|boolean',

        // images
        'images' => 'nullable|array',
        'images.*' => 'nullable|image|max:2048',
    ]);

    // Convert tags
    if (!empty($data['tags'])) {
        $data['tags'] = array_map('trim', explode(',', $data['tags']));
    }

    // Handle image uploads
    if ($request->hasFile('images')) {

        foreach ($request->file('images') as $index => $file) {
            if ($file) {

                // Upload file
                $path = $file->store('products', 'public');

                // Save to correct column
                if ($index == 0) $data['image_1'] = $path;
                if ($index == 1) $data['image_2'] = $path;
                if ($index == 2) $data['image_3'] = $path;
            }
        }
    }

    $product->update($data);

    return redirect()->back()->with('success', 'Product updated successfully');
}







public function destroy(Product $product)
{
    // delete images if needed
    if ($product->image_1) {
        Storage::delete('public/' . $product->image_1);
    }
    if ($product->image_2) {
        Storage::delete('public/' . $product->image_2);
    }
    if ($product->image_3) {
        Storage::delete('public/' . $product->image_3);
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully');
}







}






