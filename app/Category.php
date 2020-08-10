<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model {

    public function products() {
        return $this->hasMany('App\Product');
    }

    public static function deleteCategory($id) {
        $category = self::findOrFail($id);
        Storage::disk('public')->delete($category->image);
        self::destroy($id);
    }

    public static function updateCategory($id, $request) {

        $category = self::findOrFail($id);

        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->image) {
            //delete
            Storage::disk('public')->delete($category->image);
            $category->image = $request->image->store('images/categories', 'public');
        }

        $category->save();
    }

    public static function getCategoryByID($id) {
        return self::findOrFail($id);
    }

    public static function store($request) {
        $category = new self();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->image = $request->image->store('images/categories', 'public');

        $category->save();
    }

    public static function getCategory($slug) {
        return self::where('slug', $slug)->firstOrFail();
    }

    public static function getCategories() {
        return self::orderBy('slug')->get();
    }

}
