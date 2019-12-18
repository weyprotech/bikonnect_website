<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogModel;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\BlogLangModel;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use App\BlogCategoryModel;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogList = BlogModel::with(['blogcategory','blogcategory.blogcategorylang' => function($query){
            $query->where('langId',1);
        }])->with('bloglang')->where('is_enable',1)->orderby('order','asc')->get();
        $data = array(
            'blogList' => $blogList
        );
        return view('backend.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $id = preg_replace('/\./', '', uniqid('blog',true));
        //取類別
        $blogCategoryList = BlogCategoryModel::with(['blogcategorylang' => function($query){
            $query->where('langId',1);
        }])->where('is_enable',1)->get();

        //取置頂文章
        $topCount = BlogModel::where('is_top',1)->where('is_enable',1)->count();

        if($request->isMethod('post')){
            $lastblog = BlogModel::limit(1)->orderby('order','desc')->get();
            
            $uuid = Uuid::uuid1();
            $blog = new BlogModel();
            $blog->Id = $id;
            $blog->is_enable = 1;
            $blog->is_top = $request->is_top;
            $blog->categoryId = $request->categoryId;
            $blog->date = $request->date;
            $blog->order = isset($lastblog[0]->order) ? $lastblog[0]->order+1 : 1;
            $blog->img = $this->upload_img($request,'img',$id,$blog,'img','1920');
            $blog->is_visible = $request->is_visible;            
            $blog->uuid = $uuid;
            $blog->save();
            foreach ($request->contentlangs as $langKey => $langValue) {
                $lang = new BlogLangModel();
                $lang->langId = $langValue['langId'];
                $lang->bId = $id;
                $lang->title = $langValue['title'];
                $lang->description = $langValue['description'];                
                $lang->content = html_entity_decode($langValue['content']);
                $lang->save();
            }
            return redirect(action('Backend\BlogController@edit',[$id]));
        }
        $data = array(
            'id' => $id,
            'blogCategoryList' => $blogCategoryList,
            'topCount' => $topCount            
        );
        return $this->set_view('backend.blog.add',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $bId
     * @return \Illuminate\Http\Response
     */
    public function edit($bId,Request $request)
    {
        $blog = BlogModel::with('bloglang')->find($bId);
        //取類別
        $blogCategoryList = BlogCategoryModel::with(['blogcategorylang' => function($query){
            $query->where('langId',1);
        }])->where('is_enable',1)->get();

        //取置頂文章
        $topCount = BlogModel::where('is_top',1)->where('is_enable',1)->where('Id','!=',$bId)->count();

        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $blog->uuid){
                $uuid = Uuid::uuid1();
                if(!empty($blog->img)){
                    @chmod(base_path() . '/public/'.$blog->img, 0777);
                    @unlink(base_path() . '/public/'.$blog->img);
                }

                $blog->is_enable = 1;
                $blog->img = $this->upload_img($request,'img',$bId,$blog,'img','1920');
                $blog->is_visible = $request->is_visible;
                $blog->uuid = $uuid;
                $blog->is_visible = $request->is_visible;
                $blog->is_top = $request->is_top;
                $blog->date = $request->date;                
                $blog->categoryId = $request->categoryId;                
                $blog->save();
                foreach ($request->bloglangs as $blogKey => $blogValue) {
                    $lang = BlogLangModel::where('langId',$blogValue['langId'])->where('bId',$blogValue['bId'])->first();                    
                    $lang->title = $blogValue['title'];
                    $lang->description = $blogValue['description'];
                    $lang->content = html_entity_decode($blogValue['content']);                                        
                    $lang->save();
                }
            }
            return redirect(action('Backend\BlogController@index'));                  
            
        }
        $langdata = array();
        //讀出部落格類別的語系資料(因需要用語系id分類)
        foreach ($blog->bloglang as $blogKey => $blogValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($blogValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $blogValue;
                }
            }
        }
        $data = array(
            'blog' => $blog,
            'langdata' => $langdata,
            'web_langList' => $web_langList,
            'blogCategoryList' => $blogCategoryList,
            'topCount' => $topCount
        );

        return $this->set_view('backend.blog.edit',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($bId)
    {
        $blog = BlogModel::find($bId);
        $blog->is_enable = 0;
        $blog->save();

        return redirect(action('Backend\BlogController@index'));                  
        
    }

    public function order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = BlogModel::find($orderValue['Id']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect(action('Backend\BlogController@index'));
    }

    /**
     * 上傳圖片
     * 
     */
    public function upload_img($request,$name,$uuid,$content = false,$file_name = '',$width){
        //上傳圖檔
        if ($request->hasFile($name)) {
            if($request->file($name)->isValid()){

                $destinationPath = base_path() . '/public/uploads/blog/'.$uuid;

                // getting image extension
                $extension = $request->file($name)->getClientOriginalExtension();

                if (!file_exists($destinationPath)) { //Verify if the directory exists
                    mkdir($destinationPath, 0777, true); //create it if do not exists
                }
                // uuid renameing image
                $fileName = Str::uuid() . '_blog_.' . $extension;

                Image::make($request->file($name))->resize($width,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$fileName);
                $img = '/uploads/blog/'.$uuid.'/'.$fileName;
            }
        }else{
            if($content){
                $img = $content->$file_name;
            }else{
                $img = '';
            }
        }
        return $img;
    }

    /**
     * 上傳summernote圖片
     */
    public function upload_summernote(Request $request)
    {
        if (isset($request->bId) && isset($request->file)){
            $img = $this->upload_img($request,'file',$request->bId,false,'img','800');
            echo $img;
        }
    }
}
