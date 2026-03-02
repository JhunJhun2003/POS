<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('index'); // for dashboard
    }

    public function item()
    {
        $categories = Category::all(); // Fetch all categories to populate the dropdown
        $items = Inventory::with('category')->get(); // Eager load category relationship

        return view('Item.index', compact('categories', 'items')); // for add item
    }

    // for add item
    public function store(Request $request)
    {
        // Handle new category creation if needed
        if ($request->has('new_category') && ! empty($request->new_category)) {
            // Create the new category first
            $category = new Category;
            $category->name = $request->new_category;
            $category->save();

            // Use the new category ID
            $request->merge(['categoryid' => $category->id]);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'itemCode' => 'required|unique:inventory,itemCode',
            'itemName' => 'required',
            'price' => 'required|numeric',
            'categoryid' => 'required|exists:category,id',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'exp_Date' => 'required|date',
            'alert_Date' => 'required|date|before_or_equal:exp_Date',
        ]);

        $inventory = new Inventory;
        $inventory->itemCode = $validatedData['itemCode'];
        $inventory->itemName = $validatedData['itemName'];
        $inventory->price = $validatedData['price'];
        $inventory->categoryid = $validatedData['categoryid'];
        $inventory->quantity = $validatedData['quantity'];
        $inventory->cost = $validatedData['cost'];
        $inventory->exp_Date = $validatedData['exp_Date'];
        $inventory->alert_Date = $validatedData['alert_Date'];

        $inventory->save();

        return redirect()->back()->with('success', 'Item added successfully!');
    }

    // //
    public function inventory()
    {
        $categories = Category::all(); // Fetch all categories to populate the dropdown

        return view('inventory.index', compact('categories')); // for inventory
    }

    public function order()
    {
        return view('bill.index');
    }

    public function report()
    {
        return view('report.index');
    }

    public function userMenu()
    {
        return view('user.userMenu');
    }

    public function user()
    {
        return view('user.index');
    }
}
