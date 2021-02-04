<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;

use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use DataTables;

class ProductController extends BaseController
{
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Products List');

        if($request->ajax()){
            $data = Product::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a class="btn btn-outline-primary m-1" href="'. route("admin.products.edit", $data->id) .'"><i class="fa fa-edit"></i></a>';
                        $btn .=  '<a href="'. route("admin.products.delete", $data->id) .'" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('brand_name', function($data){
                        return $data->brand->name;
                    })
                    ->addColumn('categories', function($data){
                        $productCategories = '';
                        foreach ($data->categories as $category) {
                            $productCategories .= '<span class="badge badge-info">' . $category->name . '</span>';
                        }
                        return $productCategories;
                    })
                    ->addColumn('productPrice', function($data){
                        return config('settings.currency_symbol') . $data->price;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $edit = false;

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact('categories', 'brands', 'edit'));
    }
}
