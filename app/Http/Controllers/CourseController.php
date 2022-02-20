<?php

namespace App\Http\Controllers;

use App\DataTables\CourseDataTable;
use App\Http\Requests\CourseRequest;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /** @var  CourseRepository */
    private $CourseRepository;

    public function __construct(CourseRepository $CourseRepository)
    {
        $this->CourseRepository = $CourseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseDataTable $courseDataTable)
    {
        //
        return $courseDataTable->render('dashboard.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.courses.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $input = $request->all();

        $course = $this->CourseRepository->create($input);

        flash('course saved successfully.')->success();

        return redirect(route('dashboard.courses.index'));
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
        $course = $this->CourseRepository->find($id);
        
        if (empty($course)) {
            flash('course not found');
            return redirect(route('dashboard.courses.index'));
        }
        
        return view('dashboard.courses.show', compact('course'));
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
        $course = $this->CourseRepository->find($id);
        
        if (empty($course)) {
            flash('course not found');
            
            return redirect(route('dashboard.courses.index'));
        }

        return view('dashboard.courses.edit', compact('course'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        //
        $input=$request->all();
        $this->CourseRepository->update($input, $id);
                
        flash('course deleted successfully')->success();
        return redirect(route('courses.index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = $this->CourseRepository->find($id);

        if (empty($course)) {
            Flash::error('course not found');

            return redirect(route('dashboard.courses.index'));
        }

        $this->CourseRepository->delete($id);
        
        flash('course deleted successfully')->success();
        return redirect(route('dashboard.courses.index'));
    
    }
}
