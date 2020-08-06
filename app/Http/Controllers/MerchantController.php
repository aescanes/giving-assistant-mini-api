<?php

namespace App\Http\Controllers;

use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class MerchantController
 * @package App\Http\Controllers
 */
class MerchantController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAllMerchants()
    {
        return response()->json(Merchant::all());
    }

    /**
     * @param $merchant_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOneMerchant($merchant_id)
    {
        try {
            $merchant = Merchant::findOrFail($merchant_id);
        } catch (ModelNotFoundException $e) {
            return response('Merchant not found', 404);
        }
        return response()->json($merchant, 200);
    }

    public function showOneCategory($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }
        return response()->json($category);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMerchant(Request $request)
    {
        $merchant = Merchant::create($request->all());
        return response()->json($merchant, 201);
    }

    /**
     * @param $merchant_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateMerchant($merchant_id, Request $request)
    {
        $merchant = Merchant::findOrFail($merchant_id);
        $merchant->update($request->all());
        return response()->json($merchant, 200);
    }

    /**
     * @param $merchant_id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteMerchant($merchant_id)
    {
        Merchant::findOrFail($merchant_id)->delete();
        return response('Deleted Successfully', 200);
    }
}
