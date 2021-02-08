<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = Attribute::all();

        return response()->json([ 'status' => 'true', 'data' => $attributes]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function productAttributes(Request $request)
    {
        $product = Product::findOrFail($request->id);

        return response()->json($product->attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json(['status' => true, 'data' => $attribute->values]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(Request $request)
    {
        // $productAttribute = ProductAttribute::create($request->data);
        $productAttribute = new ProductAttribute();
        $productAttribute->attribute_id = $request->input('attribute_id');
        $productAttribute->value = $request->input('value');
        $productAttribute->quantity = $request->input('quantity');
        $productAttribute->price = $request->input('price');
        $productAttribute->product_id = $request->input('product_id');
        $productAttribute->save();

        if ($productAttribute) {
            return response()->json(['data' => $productAttribute ,'status' => 'success', 'message' => 'Product attribute added successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong while submitting product attribute.']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::findOrFail($request->input('id'));
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Product attribute deleted successfully.']);
    }
}
