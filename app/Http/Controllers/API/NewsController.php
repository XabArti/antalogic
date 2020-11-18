<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsGetResource;
use App\Models\News;
use Illuminate\Http\Request;
use Throwable;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $model = News::all();

        return NewsGetResource::collection($model);
    }

    /**
     * @param int $id
     * @return NewsGetResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function get(int $id)
    {
        $model = News::find($id);

        if ($model) {
            return new NewsGetResource($model);
        } else {
            return response('Entity not found', 404);
        }
    }

    /**
     * @param Request $request
     * @return NewsGetResource
     */
    public function post(Request $request)
    {
        $model = News::create([
            'title' => $request['title'],
            'text'=> $request['text'],
            'category_id'=> $request['category']['id'],
        ]);

        return new NewsGetResource($model);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return NewsGetResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function put(Request $request, int $id)
    {
        try {
            $model = News::findOrFail($id);
            $model->update($request->all());

            return new NewsGetResource($model);
        } catch (Throwable $e) {
            return response('Entity not found', 404);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $model = News::find($id);

        if ($model) {
            $model->delete();
            $model = News::all();
            return NewsGetResource::collection($model);
        } else {
            return response('Entity not found', 404);
        }
    }
}
