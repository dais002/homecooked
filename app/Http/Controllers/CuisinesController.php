<?php

namespace App\Http\Controllers;

use App\Cuisine;
use Illuminate\Http\Request;

class CuisinesController extends Controller
{
    // display all
    public function index()
    {
        return Cuisine::all();
    }

    // display one
    public function show(Cuisine $cuisine)
    {
        return Cuisine::find($cuisine);
    }

    // store
    public function store()
    {
        Cuisine::create($this->validateCuisine());

        return redirect(route('/cuisines'));
    }

    // patch/update
    public function update(Cuisine $cuisine)
    {
        $cuisine->update($this->validateCuisine());

        return redirect(route('/cuisines'));
    }

    // delete
    public function delete(Cuisine $cuisine)
    {
        $cuisine->delete();

        return redirect(route('/cuisines'));
    }

    // helper validation function
    public function validateCuisine()
    {
        return request()->validate([
            'type' => ['required', 'max:255']
        ]);
    }
}
