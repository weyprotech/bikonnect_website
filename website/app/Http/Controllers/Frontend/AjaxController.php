<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogModel;

class AjaxController extends Controller
{
    /**
     * get blog
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function get_blog(Request $request)
    {
        //設定語系
        $this->set_locale();  
        $search = $request->search;
        $category = $request->category;
        $langId = $request->langId;
        $use_key = array(
            'langId' => $langId,
            'search' => $search
        );

        // $blogList = BlogModel::with(['blogcategory','blogcategory.blogcategorylang' => function($query){
        //     $query->where('langId',$this->langList[0]->langId);
        // }])->with(['bloglang' => function($query){
        //     $query->where('langId',$this->langList[0]->langId);
        // }])->where('is_enable',1)->skip(($page-1)*12)->take(12)->orderby('order','asc')->get();

        $temp = BlogModel::with(['blogcategory','blogcategory.blogcategorylang' => function($query) use($use_key){
            $query->where('langId',$use_key['langId']);
        }])->with(['bloglang' => function($query) use($use_key){
            $query->where('langId',$use_key['langId'])->where('title','like',"%".$use_key['search']."%");
        }])->where('is_enable',1)->orderby('order','asc');

        if(!empty($category)){
            $blogList = $temp->where('categoryId',$category)->get();
        }else{
            $blogList = $temp->get();
        }

        echo json_encode(array('blogList'=>$blogList));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
