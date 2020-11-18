<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model = Category::all();

        return view('front.category.index', ['model' => $model]);
    }

    public function get(int $id)
    {
        $model = Category::with('news')->find($id);

        if ($model) {
            return view('front.category.get', ['model' => $model]);
        } else {
            return response('Entity not found', 404);
        }
    }
}
