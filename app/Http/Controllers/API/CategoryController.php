<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response ;

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
class CategoryController extends Controller
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
    public function index()
    {
        $categories=Category::activated()->orderBy('name')->get();
        $data['categories']=$categories;
        return Response::json($data, 200);
    }
}
