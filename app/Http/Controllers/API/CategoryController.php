<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryGetResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $model = Category::all();

        return CategoryGetResource::collection($model);
    }

    /**
     * @param int $id
     * @return CategoryGetResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function get(int $id)
    {
        $model = Category::find($id);

        if ($model) {
            return new CategoryGetResource($model);
        } else {
            return response('Entity not found', 404);
        }
    }

    /**
     * @param Request $request
     * @return CategoryGetResource
     */
    public function post(Request $request)
    {
        $model = Category::create($request->all());

        return new CategoryGetResource($model);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return CategoryGetResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function put(Request $request, int $id)
    {
        try {
            $model = Category::findOrFail($id);
            $model->update($request->all());

            return new CategoryGetResource($model);
        } catch (\Throwable $e) {
            return response('Entity not found', 404);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $model = Category::find($id);

        if ($model) {
            $model->delete();
            $model = Category::all();

            return CategoryGetResource::collection($model);
        } else {
            return response('Entity not found', 404);
        }
    }
}
