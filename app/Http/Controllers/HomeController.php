<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    public function home(Request $request, CategoryRepository $categoryRepository)
    {
        $categories=$categoryRepository->allCategories();
        $levels=CourseRepository::getLevels();
        return view('website.home', compact('categories', 'levels'));
    }
}
