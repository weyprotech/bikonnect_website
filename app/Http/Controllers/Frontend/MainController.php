<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutPartnerModel;
use App\WebsiteLangModel;
use App\AboutContentModel;
use App\AboutHistoryModel;
use App\AboutTeamModel;
use App\AboutHistoryTitleLangModel;
use App\AboutHistoryTitleModel;
use App\SolutionVideoModel;
use App\SolutionContentModel;
use App\SolutionAspectModel;
use App\SolutionAspectLangModel;
use App\SolutionAspectCategoryModel;
use App\SolutionAspectCategoryLangModel;
use App\SolutionTitleModel;
use App\SolutionTitleLangModel;
use App\SolutionApplicationModel;
use App\SolutionApplicationLangModel;
use App\ProductModel;
use App\Mail\contactEmail;
use Illuminate\Support\Facades\Mail;
use App\BlogModel;
use App\BlogCategoryModel;
use App\BlogCommentModel;
use Illuminate\Support\Str;
use App\HomepageContent1Model;
use App\HomepageContent2Model;
use App\HomepageContent3Model;
use App\HomepageContent4Model;
use App\LearnmoreModel;
use App\LearnmoreLangModel;
use App\BannerModel;
use App\SolutionKeyfeatureModel;
use App\SolutionServiceModel;
use App\SolutionServiceLangModel;
use App\ContactModel;
use App\ContactMailModel;
use App\EmailModel;
use App\PrivacyModel;
use App\SolutionModel;
use App\TermModel;
use App\TermlangModel;


class MainController extends Controller 
{
    public function index($locale = '') 
    {
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale(); 

            //輪播圖列表
            $bannerList = BannerModel::where('is_enable',1)->where('is_visible',1)->orderby('order','asc')->with(['bannerlang' => function($query){
                $query->where('langId', '=', $this->langList[0]->langId);
            }])->get();

            //廠商列表
            $partnerList = AboutPartnerModel::where('is_enable',1)->with(['lang' => function ($query) {
                $query->where('langId', '=', $this->langList[0]->langId);
            }])->get();

            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //內文1
            $content1 = HomepageContent1Model::where('Id',1)->with(['content1lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->first();

            //內文2
            $content2List = HomepageContent2Model::orderby('order','asc')->with('product')->with(['content2lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);            
            }])->get();

            //內文3
            $content3List = HomepageContent3Model::where('is_enable',1)->orderby('order','asc')->with(['content3lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //內文4
            $content4 = HomepageContent4Model::where('Id',1)->with(['content4lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);            
            }])->first();

            //learn more按鈕
            $learnmore = LearnmoreModel::where('Id',1)->with(['learnmorelang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->first();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);

            //seo
            $seoList = array(
                'en' => array(
                    'title' => 'Bikonnect',
                    'keyword' => 'Bikonnect',
                    'description' => 'Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => 'Bikonnect',
                    'keyword' => 'Bikonnect',
                    'description' => 'Bikonnect' 
                )
            );

            // print_r($partnerList->toArray());exit;
            $data = array(
                'seoList' => $seoList,
                'bannerList' => $bannerList,
                'partnerList' => $partnerList,
                'solutionList' => $solutionList,
                'productList' => $productList,
                'content1' => $content1,
                'content2List' => $content2List,
                'content3List' => $content3List,
                'content4' => $content4,
                'learnmore' => $learnmore,
                'contact' => $contact
            );

            return view('frontend.index',$data);
        }else{
            return redirect(action('Frontend\ErrorController@index'));
        }
        
    }

    public function about($locale = '') 
    {
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();        
            
            //圖文列表
            $contentList = AboutContentModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();
            
            //夥伴列表
            $partnerList = AboutPartnerModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //沿革標題
            $historyTitle = AboutHistoryTitleModel::with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);

            //沿革列表
            $historyList = AboutHistoryModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //團隊列表
            $teamList = AboutTeamModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);

            //seo
            $seoList = array(
                'en' => array(
                    'title' => 'About - Bikonnect',
                    'keyword' => 'About - Bikonnect',
                    'description' => 'About - Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => '關於我們 - Bikonnect',
                    'keyword' => '關於我們 - Bikonnect',
                    'description' => '關於我們 - Bikonnect' 
                )
            );

            $data = array(
                'seoList' => $seoList,            
                'contentList' => $contentList,
                'partnerList' => $partnerList,
                'historyList' => $historyList,
                'solutionList' => $solutionList,
                'productList' => $productList,            
                'teamList' => $teamList,
                'historyTitle' => $historyTitle,
                'contact' => $contact            
            );
            return view('frontend.about',$data);
        }
    }

    public function solution($url,$locale = '') 
    {
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();        
            
            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            $solution = SolutionModel::where('is_enable',1)->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->where('url',$url)->get();
            
            //Application Range
            $applicationList = SolutionApplicationModel::where('is_enable',1)->where('sId',$solution[0]->Id)->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->orderBy('order','asc')->get();

            foreach($applicationList as $applicationKey => $applicationValue){
                $applicationValue->lang = SolutionApplicationLangModel::where('aId',$applicationValue->Id)->where('langId',$this->langList[0]->langId)->get();
            }
            

            //特點列表
            $aspeccategorytList = SolutionAspectCategoryModel::where('is_enable',1)->where('sId',$solution[0]->Id)->orderby('order','asc')->get();
            $aspectList = SolutionAspectModel::where('is_enable',1)->where('sId',$solution[0]->Id)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();
            foreach ($aspectList as $contentKey => $contentValue){
                $contentValue->lang = SolutionAspectLangModel::where('aId',$contentValue->Id)->where('langId',$this->langList[0]->langId)->get();
            }
            $aaspeccategoryCount = SolutionAspectCategoryModel::where('sId',$solution[0]->Id)->count();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);


            //seo
            $seoList = array(
                'en' => array(
                    'title' => $solution[0]->lang[0]->meta_title.' - Bikonnect',
                    'keyword' => $solution[0]->lang[0]->meta_keywords.' - Bikonnect',
                    'description' => $solution[0]->lang[0]->meta_description.' - Bikonnect'
                    // 'title' => 'E-Bike data service solution, Big Data Analytics, Cycling Data Platform - Microprogram',
                    // 'keyword' => 'E-Bike data service solution,bike solution,bicycle solution,smart e-bike solution,cycling data solution,bike data solution,bicycle data solution,cycling data sensor,bike data sensor,bicycle data sensor,smart cycling platform,bike platform,bicycle platform,smart cycling system,bike system,bicycle system,cycling digital service,bike digital service,bicycle digital service,cycling data service,bike data service,bicycle data service,cycling data integration,bike data integration,bicycle data integration,cycling IoT,bike IoT,bicycle IoT,connected cycling solution,connected bike solution,connected bicycle solution,cycling IoT solution,bike IoT solution,bicycle IoT solution,e-bike IoT,smart mobility solution,the future of cycling,connected cycling service,connected bike service,connected bicycle service,connected cycling platform,connected bike platform,connected bicycle platform,cycling connectivity,bike connectivity,e-bike connectivity,bicycle connectivity',
                    // 'description' => 'The E-Bike data service solution combines E-Bike computer, Apps, Dealer Management System and Cycling Data Platform to enhance the value of the E-Bike rider experience and bicycle brand service.'
                ),
                'zh-TW' => array(
                    'title' => $solution[0]->lang[0]->meta_title.' - Bikonnect',
                    'keyword' => $solution[0]->lang[0]->meta_keywords.' - Bikonnect',
                    'description' => $solution[0]->lang[0]->meta_description.' - Bikonnect'
                    // 'title' => 'E-Bike數據服務解決方案，電動自行車物聯網、騎乘數據平台-微程式',
                    // 'keyword' => '自行車數據,自行車物聯網,自行車系統,自行車IoT,自行車數據騎乘,自行車數據平台,自行車系統商,自行車系統商推薦,自行車數位升級,自行車科技升級,自行車數據服務,電動自行車數據,電動自行車物聯網,電動自行車系統,電動自行車IoT,電動自行車數據騎乘,電動自行車數據平台,電動自行車系統商,電動自行車系統商推薦,電動自行車數位升級,電動自行車科技升級,電動自行車數據服務,E-Bike 數據服務解決方案',
                    // 'description' => '微程式提供的E-Bike 數據服務解決方案，結合電動自行車車錶、App、門店管理系統及騎乘數據平台，提升 E-Bike 車友體驗與自行車品牌服務價值。'
                )
            );

            $data = array(
                'seoList' => $seoList,
                'solution' => $solution[0],
                'aspectList' => $aspectList,
                'productList' => $productList,
                'solutionList' => $solutionList,
                'contact' => $contact,
                'applicationList' => $applicationList,
                'aspeccategorytList' => $aspeccategorytList,
                'aaspeccategoryCount' => $aaspeccategoryCount
            );
            return view('frontend.solution',$data);
        }
    }

    public function product($url,$locale){
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();        
            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            $product = ProductModel::with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->where('url',$url)->get();

            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);
            
            //seo
            $seoList = array(
                'en' => array(
                    'title' => $product[0]->lang[0]->meta_title.' - Bikonnect',
                    'keyword' => $product[0]->lang[0]->meta_keywords.' - Bikonnect',
                    'description' => $product[0]->lang[0]->meta_description.' - Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => $product[0]->lang[0]->meta_title.' - Bikonnect',
                    'keyword' => $product[0]->lang[0]->meta_keywords.' - Bikonnect',
                    'description' => $product[0]->lang[0]->meta_description.' - Bikonnect' 
                )
            );

            $data = array(
                'seoList' => $seoList,            
                'productList' => $productList,
                'solutionList' => $solutionList,
                'product' => $product[0],
                'productId' => $product[0]->Id,
                'contact' => $contact            
            );
            return view('frontend.product',$data);
        }
    }

    public function privacy($locale = '') 
    {
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();

            //隱私權
            $privacy = PrivacyModel::with(['privacylang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);

            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //seo
            $seoList = array(
                'en' => array(
                    'title' => 'Privacy - Bikonnect',
                    'keyword' => 'Privacy - Bikonnect',
                    'description' => 'Privacy - Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => '隱私權 - Bikonnect',
                    'keyword' => '隱私權 - Bikonnect',
                    'description' => '隱私權 - Bikonnect' 
                )
            );
            
            $data = array(
                'privacy' => $privacy,
                'seoList' => $seoList,
                'productList' => $productList,
                'solutionList' => $solutionList
            );

            return view('frontend.privacy',$data);
        }
    }

    public function term($locale = '') 
    {
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();

            //隱私權
            $term = TermModel::with(['termlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);
        
            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //seo
            $seoList = array(
                'en' => array(
                    'title' => 'TERMS AND CONDITIONS - Bikonnect',
                    'keyword' => 'TERMS AND CONDITIONS - Bikonnect',
                    'description' => 'TERMS AND CONDITIONS - Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => '條款 - Bikonnect',
                    'keyword' => '條款 - Bikonnect',
                    'description' => '條款 - Bikonnect' 
                )
            );
            
            $data = array(
                'term' => $term,
                'seoList' => $seoList,
                'solutionList' => $solutionList,
                'productList' => $productList            
            );

            return view('frontend.term',$data);
        }
    }

    public function send_email(Request $request){
        //設定語系        
        $this->set_locale();        
        $contact = ContactModel::with(['contactlang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->find(1);

        $emailList = EmailModel::where('is_enable',1)->get();
        
        $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content
        );
        foreach($emailList as $emailKey => $emailValue){
            Mail::to($emailValue->email)->send(new contactEmail($data));
        }        
        
        $mail = new ContactMailModel();
        $mail->is_enable = 1;
        $mail->name = $request->name;
        $mail->phone = $request->phone;
        $mail->email = $request->email;
        $mail->content = $request->content;
        $mail->save();
        
        return redirect('main.index');
    }

    public function blog($page, $locale = ''){
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();

            //全部文章
            $blogList = BlogModel::with(['blogcategory', 'blogcategory.blogcategorylang' => function($query){
                $query->where('langId',$this->langList[0]->langId);
            }])->with(['bloglang' => function($query){
                $query->where('langId',$this->langList[0]->langId);
            }])->where('is_enable', 1)->where('url', '!=', '')->skip(($page-1)*12)->take(12)->orderby('order', 'asc')->get();

            //抓總頁數
            $totalpage = ceil(BlogModel::where('is_enable', 1)->where('url', '!=', '')->count()/12);

            //文章類別
            $blogCategoryList = BlogCategoryModel::with(['blogcategorylang' => function($query){
                $query->where('langId', $this->langList[0]->langId);
            }])->where('is_enable', 1)->get();

            //置頂文章
            $topList = BlogModel::with(['blogcategory', 'blogcategory.blogcategorylang' => function($query){
                $query->where('langId', $this->langList[0]->langId);
            }])->with(['bloglang' => function($query){
                $query->where('langId', $this->langList[0]->langId);
            }])->where('is_enable', 1)->where('is_top', 1)->orderby('order', 'asc')->get();

            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //產品列表
            $productList = ProductModel::where('is_enable', 1)->orderby('order', 'asc')->with(['lang' => function($query){
                $query->where('langId', '=', $this->langList[0]->langId);
            }])->get();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId', '=', $this->langList[0]->langId);
            }])->find(1);

            //seo
            $seoList = array(
                'en' => array(
                    'title' => 'Blog - Bikonnect',
                    'keyword' => 'Blog - Bikonnect',
                    'description' => 'Blog - Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => '部落格 - Bikonnect',
                    'keyword' => '部落格 - Bikonnect',
                    'description' => '部落格 - Bikonnect' 
                )
            );

            $data = array(
                'seoList' => $seoList,            
                'blogCategoryList' => $blogCategoryList,
                'blogList' => $blogList,
                'topList' => $topList,
                'solutionList' => $solutionList,
                'productList' => $productList,
                'page' => $page,
                'totalpage' => $totalpage,
                'langId' => $this->langList[0]->langId,
                'contact' => $contact
                
            );
            return view('frontend.blog',$data);
        }
    }

    public function blog_detail($url,$page,$locale = '',Request $request){
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();

            //找尋部落格
            $blog = BlogModel::with(['blogcategory','blogcategory.blogcategorylang' => function($query){
                $query->where('langId',$this->langList[0]->langId);
            }])->with(['bloglang' => function($query){
                $query->where('langId',$this->langList[0]->langId);
            }])->with(['blogcomment'])->where('is_enable',1)->orderby('order','asc')->where('url','=',$url)->get();
            //全部文章(不包含自己)
            $blogList = BlogModel::with(['blogcategory','blogcategory.blogcategorylang' => function($query){
                $query->where('langId',$this->langList[0]->langId);
            }])->with(['bloglang' => function($query){
                $query->where('langId',$this->langList[0]->langId);
            }])->where('is_enable',1)->where('Id','!=',$blog[0]->Id)->get();

            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();
            
            if($blogList->count() > 2){
                $related_blog = $blogList->random(2);
            }else{
                $related_blog = $blogList;
            }

            //如果回傳的類別是post
            if($request->isMethod('post')){
                $comment = new BlogCommentModel();
                $comment->bId = $blog[0]->Id;
                $comment->date = date('Y-m-d');
                $comment->uuid = Str::uuid();
                $comment->name = $request->name;
                $comment->message = $request->message;
                $comment->save();
                return redirect(action('Frontend\MainController@blog_detail',[$blog[0]->url,$page]));
            }

            $commentCount = BlogCommentModel::where('bId',$blog[0]->Id)->count();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);

            //seo
            $seoList = array(
                'en' => array(
                    'title' => $blog[0]->bloglang[0]->title.' - Bikonnect',
                    'keyword' => $blog[0]->bloglang[0]->title.' - Bikonnect',
                    'description' => $blog[0]->bloglang[0]->title.' - Bikonnect'
                ),
                'zh-TW' => array(
                    'title' => $blog[0]->bloglang[0]->title.' - Bikonnect',
                    'keyword' => $blog[0]->bloglang[0]->title.' - Bikonnect',
                    'description' => $blog[0]->bloglang[0]->title.' - Bikonnect' 
                )
            );

            $data = array(
                'seoList' => $seoList,            
                'blog' => $blog[0],
                'solutionList' => $solutionList,
                'page' => $page,
                'productList' => $productList,
                'related_blog' => $related_blog,
                'commentCount' => $commentCount,
                'contact' => $contact            
            );
            return view('frontend.blog_detail',$data);
        }
    }

    public function search($locale,Request $request){
        if($locale == 'en' || $locale == 'zh-TW' || $locale == ''){
            //設定語系
            $this->set_locale();
            
            //解決方案列表
            $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //產品列表
            $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->get();

            //聯絡我們
            $contact = ContactModel::with(['contactlang' => function($query){
                $query->where('langId','=',$this->langList[0]->langId);
            }])->find(1);
        }
        $data = array(
            'q' => $request['q'],
            'solutionList' => $solutionList,
            'productList' => $productList,
            'contact' => $contact
        );
        return view('frontend.search',$data);
    }
}
