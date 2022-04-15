<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(Request $request){
        $categories=Category::get();
        return view('categories',compact('categories'));
    }

    public function destroy(Request $request,$id){
        $category=Category::find($id);
        $category->delete();
        return back()->with('success','Category deleted successfully');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Category::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Category deleted successfully."]);

    }

}
