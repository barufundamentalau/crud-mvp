<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $pages = Page::latest()->paginate(4);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Halaman"
            ],
            "data" => $pages
        ], 200);
    }


    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if($page) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data Halaman"
                ],
                "data" => $page
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data Halaman Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }

    /**
     * PageHomePage
     *
     * @return void
     */
    public function PageHomePage()
    {
        $pages = Page::latest()->take(5)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Halaman Homepage"
            ],
            "data" => $pages
        ], 200);
    }

}
