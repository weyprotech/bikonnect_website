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
                
                for($i = 1;$i<=4;$i++){
                    $img[$i] = $this->upload_img($request,'productlangs.'.$langValue['langId'].'.img_'.$i,$uuid);
                }
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
                $lang->img_1 = $img[1];
                $lang->img_2 = $img[2];
                $lang->img_3 = $img[3];
                $lang->img_4 = $img[4];
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
                $content->uuid = $uuid;
                $content->save();
                foreach ($request->productlangs as $contentKey => $contentValue) {
                    $content = ProductLangModel::where('langId',$contentValue['langId'])->where('pId',$productId)->get();
                    // print_r($content[0]->toArray());exit;
                    //上傳圖檔
                    for($i = 1;$i<=4;$i++){
                        $img[$i] = $this->upload_img($request,'productlangs.'.$contentValue['langId'].'.img_'.$i,$productId,$content[0],'img_'.$i);
                    }
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
                        'img_1' => $img[1],
                        'img_2' => $img[2],
                        'img_3' => $img[3],
                        'img_4' => $img[4],                        
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
        $productid = ProductModel::find($productid);
        $productid->is_enable = 0;
        $productid->save();
        return redirect('backend/product');   
    }

    /**
     * 上傳圖片
     * 
     */
    public function upload_img($request,$name,$uuid,$content = false,$file_name = ''){
        //上傳圖檔
        if ($request->hasFile($name)) {
            if($request->file($name)->isValid()){
                $destinationPath = base_path() . '/public/uploads/product/'.$uuid;
                // getting image extension
                $extension = $request->file($name)->getClientOriginalExtension();
                
                // uuid renameing image
                $fileName = Str::uuid() . '_product_.' . $extension;
            
                // move file to dest
                $request->file($name)->move($destinationPath, $fileName);
                // save data
                $img = '/uploads/product/'.$uuid.'/'.$fileName;                             
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
