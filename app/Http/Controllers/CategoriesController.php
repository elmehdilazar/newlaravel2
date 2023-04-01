<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view("categories.list", [
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Categories::create([
            "name" => $request->name
        ]);
        return redirect()->back()->with([
            "success" => "categorie ajouté"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=Categories::find($id)->first();

        return view("categories.edit", [
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $categories = Categories::find($id);
        $categories->update([
            "name" => $request->name,

        ]);
        return redirect()->back()->with([
            "success" => "categorie modifier"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Categories::find( $id)->first();
        $post->delete();

        return redirect()->route("home")->with([
            "success" => "categorie supprimé"
        ]);
    }
}
