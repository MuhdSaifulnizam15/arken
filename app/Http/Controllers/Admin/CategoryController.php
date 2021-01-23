<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DataTables;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends BaseController
{
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->listCategories();
        $this->setPageTitle('Categories', 'List of all categories');
        
        if($request->ajax()){
            $data = Category::latest()
                        ->where('id', '!=', '1')
                        ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="#" class="btn btn-outline-primary m-1"><i class="fa fa-edit"></i></a>';
                        $btn .=  '<a href="#" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('parent_name', function($data){
                        return $data->parent->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.categories.index', $categories);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->listCategories('id', 'asc');

        $this->setPageTitle('Categories', 'Create Category');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category added successfully' ,'success',false, false);
    }
}
