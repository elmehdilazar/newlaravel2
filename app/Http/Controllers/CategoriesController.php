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
    public function __construct()
    {
      // $this->authorizeResource(Categories::class, "category");
    }
    public function index()
    {
        $categories = Categories::all();
        $this->authorize("viewAny", $categories);
        return view("categories.list", [
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", Categories::class);
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize("create",Categories::class);
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
        $this->authorize("view", $categories);
    }

    /**
     * Show the form for editing the specified resource. chno far9 ma bin
     */
    public function edit($id)
    {
      //  dd($categories->id);
        $categories=Categories::find($id)->first();
  $this->authorize("update",$categories);
        return view("categories.edit", [
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Categories $categories)
    {
      //  $categories = Categories::find($id);
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
    public function destroy(Categories $categories)
    {
       // $categories = Categories::find( $id)->first();
        $categories->delete();

        return redirect()->route("home")->with([
            "success" => "categorie supprimé"
        ]);
    }
}
