<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class AttributeValueController extends Controller
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function getValues(Request $request)
    {
        $attributeId = $request->input('id');
        $attribute = $this->attributeRepository->findAttributeById($attributeId);
        // $attribute = $this->attributeRepository->listAttributes();

        $values = $attribute->values;

        return response()->json($values);
    }

    public function addValues(Request $request)
    {
        $value = new AttributeValue();
        $value->attribute_id = $request->input('id');
        $value->value = $request->input('value');
        $value->price = $request->input('price');
        $value->save();

        return response()->json($value);
    }
}
