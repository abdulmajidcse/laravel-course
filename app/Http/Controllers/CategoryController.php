<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();

        // foreach($categories as $category) {
        //     echo $category->name . '<br/>';
        // }

        Category::create([
            'name' => 'Lumen'
        ]);

        return 'success';
    }
}
