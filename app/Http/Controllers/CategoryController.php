<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAllCategories()
    {
        return response()->json(Category::all());
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOneCategory($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }
        return response()->json($category, 200);
    }

    public function showAllMerchantsFromCategory($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }
        $merchants = $category->merchants;
        return response()->json($merchants, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCategory(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * @param $category_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCategory($category_id, Request $request)
    {
        $category = Category::findOrFail($category_id);
        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteCategory($category_id)
    {
        Category::findOrFail($category_id)->delete();
        return response('Deleted Successfully', 200);
    }
}
