<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * @OA\Get(
 *      path="categories",
 *      operationId="GetPage",
 *      tags={"Pages"},
 *      summary="Get Page",
 *      description="Get page details by slug",
 *     @OA\Parameter (
 *     description="slug of page",
 *     name="slug",
 *    example="about-us",
 *     in="path",
 *    @OA\Schema(
 *       type="string",
 *    ),
 *     ),
 *      @OA\Response(
 *          response=200,
 *          description="Success get page details",
 *      @OA\JsonContent(
 *     @OA\Property (property="status", type="integer", example="1"),
 *     @OA\Property (property="message", type="string", example="Success get page details")
 * ),
 *     )
 *       )
 *     )
 *
 */
class CourseController extends Controller
{
    /**
     * @OA\Info(
     *      title="dsds",
     *      version="1"
     * )
     * @OA\Get(
     *      path="/projects",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProjectResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(Request $request, CourseRepository $courseRepository)
    {
        $time = $request->time;
        return CourseResource::collection(
            $courseRepository->allQuery()
                ->when($request->categories, function ($q) use ($request) {
                    $q->whereIn('category_id', $request->categories);
                })
                ->when($request->levels, function ($q) use ($request) {
                    $q->whereIn('levels', $request->levels);
                })
                ->when($request->filtertext, function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->filtertext . '%');
                })
                ->when($time, function ($q) use ($time) {
                    $sign = '>';
                    if ($time < 0) {
                        $sign = '<';
                        $time *= -1;
                    }
                    $q->where('hours', $sign, $time);
                })
                ->with('category')->paginate()
        )->response();

    }
}
