<?php

namespace App\Http\Controllers;

use App\Cuisine;
use App\Http\Requests\CuisineRequest;
use App\Http\Resources\CuisineResource;

// will not use - saving for example
class CuisineController extends Controller
{

    public function index()
    {
        $cuisine = Cuisine::paginate();
        return CuisineResource::collection($cuisine);
    }


    public function store(CuisineRequest $request)
    {
        $cuisine = Cuisine::create($request->validated());
        return $cuisine;
    }


    public function show(Cuisine $cuisine)
    {
        return new CuisineResource($cuisine);
    }


    public function update(CuisineRequest $request, $id)
    {
        $cuisine = Cuisine::find($id)->update($request->validated());
        return $cuisine;
    }


    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();
        return response()->noContent();
    }
}
