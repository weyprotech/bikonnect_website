<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogCategoryModel;
use Ramsey\Uuid\Uuid;
use App\BlogCategoryLangModel;
use App\WebsiteLangModel;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = BlogCategoryModel::with('blogcategorylang')->where('is_enable',1)->orderby('updated_at','desc')->get();
        $data = array(
            'categoryList' => $categoryList
        );
        return view('backend.blog.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $uuid = Uuid::uuid1();
            $id = preg_replace('/\./', '', uniqid('blog',true));
            $category = new BlogCategoryModel();
            $category->Id = $id;
            $category->is_enable = 1;
            $category->is_visible = $request->is_visible;            
            $category->uuid = $uuid;
            $category->save();
            foreach ($request->categorylangs as $langKey => $langValue) {
                $lang = new BlogCategoryLangModel();
                $lang->langId = $langValue['langId'];
                $lang->cId = $id;
                $lang->title = $langValue['title'];
                $lang->save();
            }
            return redirect(action('Backend\BlogCategoryController@edit',[$id]));
        }
        return $this->set_view('backend.blog.category.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cId
     * @return \Illuminate\Http\Response
     */
    public function edit($cId,Request $request)
    {
        $category = BlogCategoryModel::with('blogcategorylang')->find($cId);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $category->uuid){
                $uuid = Uuid::uuid1();
                $category->uuid = $uuid;
                $category->is_visible = $request->is_visible;
                $category->save();
                foreach ($request->categorylangs as $categoryKey => $categoryValue) {
                    $lang = BlogCategoryLangModel::where('langId',$categoryValue['langId'])->where('cId',$categoryValue['cId'])->first();                    
                    $lang->title = $categoryValue['title'];
                    $lang->save();
                }
            }
            return redirect(action('Backend\BlogCategoryController@index'));                  
            
        }

        //讀出部落格類別的語系資料(因需要用語系id分類)
        foreach ($category->blogcategorylang as $categoryKey => $categoryValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($categoryValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $categoryValue;
                }
            }
        }

        $data = array(
            'category' => $category,
            'langdata' => $langdata
        );

        return $this->set_view('backend.blog.category.edit',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($cId)
    {
        $category = BlogCategoryModel::find($cId);
        $category->is_enable = 0;
        $category->save();
        return redirect(action('Backend\BlogCategoryController@index'));
    }
}
