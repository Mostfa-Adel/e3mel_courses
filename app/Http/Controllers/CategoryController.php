<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

        /** @var  CategoryRepository */
        private $CategoryRepository;

        public function __construct(CategoryRepository $CategoryRepository)
        {
            $this->CategoryRepository = $CategoryRepository;
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $categoryDataTable)
    {
        //
        return $categoryDataTable->render('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $input = $request->all();

        $category = $this->CategoryRepository->create($input);

        flash('category saved successfully.')->success();

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = $this->CategoryRepository->find($id);
        
        if (empty($category)) {
            flash('category not found');
            return redirect(route('categories.index'));
        }
        
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = $this->CategoryRepository->find($id);
        
        if (empty($category)) {
            flash('category not found');
            
            return redirect(route('categories.index'));
        }

        return view('dashboard.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $input=$request->all();
        $this->CategoryRepository->update($input, $id);
                
        flash('category updated successfully')->success();
        return redirect(route('categories.index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = $this->CategoryRepository->find($id);

        if (empty($category)) {
            Flash::error('category not found');

            return redirect(route('categories.index'));
        }

        $this->CategoryRepository->delete($id);
        
        flash('category deleted successfully')->success();
        return redirect(route('categories.index'));
    
    }

}
