<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function store(Request $request)
    {
        $product = $this->productRepository->findProductById($request->product_id);

    	$image = $request->file('file');
        $avatarName = $image->getClientOriginalName();
        $imagePath = $this->uploadOne($image, 'products');
        // $image->move(public_path('products'),$avatarName);
         
        $imageUpload = new ProductImage([
            'full' => $imagePath,
        ]);
        // $imageUpload->full = $imagePath;
        $product->images()->save($imageUpload);
        return response()->json(['status' => 'success', 'message' => 'Images successfully uploaded.']);
    }

    public function delete(Request $request)
    {
        $image = ProductImage::findOrFail($request->input('id'));

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }

        $image->delete();

        return response()->json(['status' => 'success', 'message' => 'Images successfully deleted.']);
    }
}
