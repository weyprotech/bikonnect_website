<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ProductModel;
use Ramsey\Uuid\Uuid;
use DB;
use Illuminate\Support\Str;
use App\ProductLangModel;
use App\WebsiteLangModel;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->get();
        $data = array(
            'productList' => $productList
        );
        
        return $this->set_view('backend.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $uuid = Str::uuid();
       
        $productList = ProductModel::limit(1)->orderby('order','desc')->get();
        
        if($request->isMethod('post')){

            $productList = ProductModel::limit(1)->orderby('order','desc')->get();
            $product = new ProductModel();
            $product->is_enable = 1;
            $product->Id = $uuid;
            $product->uuid = $uuid;
            $product->order = $productList[0]->order+1;
            $product->save();
            
            foreach ($request->productlangs as $langKey => $langValue) {
                $img_1 = $this->upload_img($request,'productlangs.'.$langValue['langId'].'.img_1',$uuid,false,'img_1',1057);
                $img_2 = $this->upload_img($request,'productlangs.'.$langValue['langId'].'.img_2',$uuid,false,'img_2',1040);
                $img_3 = $this->upload_img($request,'productlangs.'.$langValue['langId'].'.img_3',$uuid,false,'img_3',748);
                $img_4 = $this->upload_img($request,'productlangs.'.$langValue['langId'].'.img_4',$uuid,false,'img_4',752);
                $img_5 = $this->upload_img($request,'productlangs.'.$langValue['langId'].'.img_5',$uuid,false,'img_5',230);                

                $lang = new ProductLangModel();
                $lang->pId = $uuid;                
                $lang->langId = $langValue['langId'];
                $lang->title = $langValue['title'];   
                $lang->meta_title = $langValue['meta_title'];
                $lang->meta_description = $langValue['meta_description'];
                $lang->meta_keywords = $langValue['meta_keywords'];
                $lang->title_1 = $langValue['title_1'];
                $lang->title_2 = $langValue['title_2'];
                $lang->title_3 = $langValue['title_3'];
                $lang->title_4 = $langValue['title_4'];
                $lang->img_1 = $img_1;
                $lang->img_2 = $img_2;
                $lang->img_3 = $img_3;
                $lang->img_4 = $img_4;
                $lang->img_5 = $img_5;
                $lang->content_1 = $langValue['content_1'];
                $lang->content_2 = $langValue['content_2'];
                $lang->content_3 = html_entity_decode($langValue['content_3']);
                $lang->content_4 = $langValue['content_4'];
                $lang->save();
            }
            return redirect('backend/product/index');
        }
        return $this->set_view('backend.product.add');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $productId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($productId,Request $request)
    {
        $content = ProductModel::with('lang')->find($productId);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        $uuid = Uuid::uuid1();
        if($request->isMethod('post')){
            
            if($request->uuid == $content->uuid){
                $content->url = $request->url;
                $content->uuid = $uuid;
                $content->save();
                foreach ($request->productlangs as $contentKey => $contentValue) {
                    $content = ProductLangModel::where('langId',$contentValue['langId'])->where('pId',$productId)->get();

                    //上傳圖檔
                    $img_1 = $this->upload_img($request,'productlangs.'.$contentValue['langId'].'.img_1',$productId,$content[0],'img_1',1057);
                    $img_2 = $this->upload_img($request,'productlangs.'.$contentValue['langId'].'.img_2',$productId,$content[0],'img_2',1040);
                    $img_3 = $this->upload_img($request,'productlangs.'.$contentValue['langId'].'.img_3',$productId,$content[0],'img_3',748);
                    $img_4 = $this->upload_img($request,'productlangs.'.$contentValue['langId'].'.img_4',$productId,$content[0],'img_4',752);
                    $img_5 = $this->upload_img($request,'productlangs.'.$contentValue['langId'].'.img_5',$productId,$content[0],'img_5',230);
                    $dm_file = $this->upload_dm($request,'productlangs.'.$contentValue['langId'].'.dm_file',$productId,$content[0],'dm_file');

                    DB::table('tb_product_lang')
                    ->where('pId',$productId)
                    ->where('langId',$contentValue['langId'])
                    ->update(
                        array('langId' => $contentValue['langId'],
                        'title' => $contentValue['title'], 
                        'meta_title' => $contentValue['meta_title'],
                        'meta_description' => $contentValue['meta_description'],
                        'meta_keywords' => $contentValue['meta_keywords'],
                        'title_1' => $contentValue['title_1'],
                        'title_2' => $contentValue['title_2'],
                        'title_3' => $contentValue['title_3'],
                        'title_4' => $contentValue['title_4'],
                        'img_1' => $img_1,
                        'img_2' => $img_2,
                        'img_3' => $img_3,
                        'img_4' => $img_4,
                        'img_5' => $img_5,
                        'dm_file' => $dm_file,
                        'content_1'=> $contentValue['content_1'],
                        'content_2'=> $contentValue['content_2'],
                        'content_3'=> html_entity_decode($contentValue['content_3']),
                        'content_4'=> $contentValue['content_4']
                    ));
                }
                return redirect('backend/product/index');                  
            }
        }
        //讀出圖文的語系資料
        foreach ($content->lang as $contentKey => $contentValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($contentValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $contentValue;
                }
            }
        }
        $data = array(
            'content' => $content,
            'langdata' => $langdata
        );
        return $this->set_view('backend.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function order_save(Request $request)
    {
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = ProductModel::find($orderValue['pId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect('backend/product/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($productid)
    {
        $productid = ProductModel::with('lang')->find($productid);
        $productid->is_enable = 0;
        
        //刪除圖檔
        if(file_exists(base_path() . '/public/'.$productid->lang[0]->img_1)){
            @chmod(base_path() . '/public/'.$productid->lang[0]->img_1, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[0]->img_1);
        }

        if(file_exists(base_path() . '/public/'.$productid->lang[0]->img_2)){
            @chmod(base_path() . '/public/'.$productid->lang[0]->img_2, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[0]->img_2);
        }
    
        if(file_exists(base_path() . '/public/'.$productid->lang[0]->img_3)){
            @chmod(base_path() . '/public/'.$productid->lang[0]->img_3, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[0]->img_3);
        }
    
        if(file_exists(base_path() . '/public/'.$productid->lang[0]->img_4)){
            @chmod(base_path() . '/public/'.$productid->lang[0]->img_4, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[0]->img_4);
        }
        
        if(file_exists(base_path() . '/public/'.$productid->lang[0]->img_5)){
            @chmod(base_path() . '/public/'.$productid->lang[0]->img_5, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[0]->img_5);
        }

        if(file_exists(base_path() . '/public/'.$productid->lang[0]->dm_file)){
            @chmod(base_path() . '/public/'.$productid->lang[0]->dm_file, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[0]->dm_file);
        }
        
        if(file_exists(base_path() . '/public/'.$productid->lang[1]->img_1)){
            @chmod(base_path() . '/public/'.$productid->lang[1]->img_1, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[1]->img_1);
        }
        
        if(file_exists(base_path() . '/public/'.$productid->lang[1]->img_2)){
            @chmod(base_path() . '/public/'.$productid->lang[1]->img_2, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[1]->img_2);
        }
        
        if(file_exists(base_path() . '/public/'.$productid->lang[1]->img_3)){
            @chmod(base_path() . '/public/'.$productid->lang[1]->img_3, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[1]->img_3);
        }

        if(file_exists(base_path() . '/public/'.$productid->lang[1]->img_4)){
            @chmod(base_path() . '/public/'.$productid->lang[1]->img_4, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[1]->img_4);
        }

        if(file_exists(base_path() . '/public/'.$productid->lang[1]->img_5)){
            @chmod(base_path() . '/public/'.$productid->lang[1]->img_5, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[1]->img_5);
        }   
        
        if(file_exists(base_path() . '/public/'.$productid->lang[1]->dm_file)){
            @chmod(base_path() . '/public/'.$productid->lang[1]->dm_file, 0777);
            @unlink(base_path() . '/public/'.$productid->lang[1]->dm_file);
        }
        @rmdir(base_path() . '/public/uploads/product/'.$productid->Id);
        $productid->save();
        return redirect('backend/product/index');   
    }

    /**
     * 驗證連結是否重複
     * @param string $url
     */
    public function url_validation(Request $request){
        $url_value = $request->input('url_value');
        $product = ProductModel::where('url',$url_value)->get();
        if(!isset($product[0])){
            echo json_encode(array('status' => 1));
        }else{
            echo json_encode(array('status' => 0));
        }
    }

    /**
     * 上傳圖片
     * 
     */
    public function upload_img($request,$name,$uuid,$content = false,$file_name = '',$width){
        //上傳圖檔
        if ($request->hasFile($name)) {
            if($request->file($name)->isValid()){

                $destinationPath = base_path() . '/public/uploads/product/'.$uuid;
                // getting image extension
                $extension = $request->file($name)->getClientOriginalExtension();
                
                if (!file_exists($destinationPath)) { //Verify if the directory exists
                    mkdir($destinationPath, 0777, true); //create it if do not exists
                }

                // uuid renameing image
                $fileName = Str::uuid() . '_product_.' . $extension;
            
                Image::make($request->file($name))->resize($width,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath.'/thumb_'.$fileName);

                // move file to dest
                // $request->file($name)->move($destinationPath, $fileName);
                // save data
                $img = '/uploads/product/'.$uuid.'/thumb_'.$fileName;
                if(file_exists(base_path() . '/public/'.@$content->$file_name)){
                    @chmod(base_path() . '/public/'.$content->$file_name, 0777);
                    @unlink(base_path() . '/public/'.$content->$file_name);
                }
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
     * 上傳DM檔案
     */
    public function upload_dm($request,$name,$uuid,$content = false,$file_name = ''){        
        if($request->hasFile($name)){
            if($request->file($name)->isValid()){
                $destinationPath = base_path() . '/public/uploads/product/'.$uuid;
                // getting image extension
                $extension = $request->file($name)->getClientOriginalExtension();
                $filename = $request->file($name)->getClientOriginalName();
                if (!file_exists($destinationPath)) { //Verify if the directory exists
                    mkdir($destinationPath, 0777, true); //create it if do not exists
                }

                // uuid renameing image
                $fileName = $filename;
            
                // Image::make($request->file($name))->resize($width,null,function($constraint){
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/thumb_'.$fileName);

                // move file to dest
                $request->file($name)->move($destinationPath, $fileName);
                // save data
                $img = '/uploads/product/'.$uuid.'/'.$fileName;
                if(file_exists(base_path() . '/public/'.@$content->$file_name)){
                    @chmod(base_path() . '/public/'.$content->$file_name, 0777);
                    @unlink(base_path() . '/public/'.$content->$file_name);
                }
            }else{
                if($content){
                    $img = $content->$file_name;
                }else{
                    $img = '';
                }
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
}
