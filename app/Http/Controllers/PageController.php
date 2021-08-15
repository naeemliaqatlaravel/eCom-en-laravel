<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Resources\PageResources;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page=Page::paginate(5);
        // return  PageResources::collection($page);
        return $page;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $page=new Page();
        $page->title=$request->title;
        $page->body=$request->body;
        if($page->save()){
        return ['message'=>'Save record'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page,$id)
    {
        $page=Page::findOrFail($id);
        // return new PageResources($page);
                return $page;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $page=Page::findOrFail($id);
        $page->title=$request->title;
        $page->body=$request->body;
        if ($page->save()) {
        return ['message'=>'Updated record'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page ,$id)
    {
        $page=Page::findOrFail($id);
        if ($page->delete()) {
        return ['message'=>'Deleted record'];
        }
    }
}
