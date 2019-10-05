<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutContentModel;
use App\AboutContentLangModel;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use DB;
use App\AboutHistoryModel;
use App\AboutHistoryLangModel;
use App\AboutTeamModel;
use App\AboutTeamLangModel;
use App\AboutPartnerModel;
use App\AboutPartnerLangModel;



class AboutController extends Controller 
{
    /***圖文區維護***/
    public function content() 
    {
        $contentList = AboutContentModel::with('lang')->where('is_enable',1)->get();
        $data = array(
            'contentList' => $contentList
        );
        return view('backend.about.content',$data);
    }

    public function editcontent($contentId,Request $request) 
    {
        $content = AboutContentModel::with('lang')->find($contentId);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $contentKey => $contentValue) {     

                    $content = AboutContentLangModel::where('langId',$contentValue['langId'])->where('cId',$contentId)->get();
                    //上傳圖檔
                    if ($request->hasFile('contentlangs.'.$contentValue['langId'].'.img')) {
                        
                        if($request->file('contentlangs.'.$contentValue['langId'].'.img')->isValid()){
                            $destinationPath = base_path() . '/public/uploads/about/content/'.$contentId;
                            // getting image extension
                            $extension = $request->file('contentlangs.'.$contentValue['langId'].'.img')->getClientOriginalExtension();
                            
                            // uuid renameing image
                            $fileName = Str::uuid() . '_group_.' . $extension;
                        
                            // move file to dest
                            $request->file('contentlangs.'.$contentValue['langId'].'.img')->move($destinationPath, $fileName);
                            // save data
                            $contentValue['img'] = '/uploads/about/content/'.$contentId.'/'.$fileName;                             
                        }
                    }else{
                        $contentValue['img'] = $content[0]->img;
                    }
                    DB::table('tb_about_content_lang')
                    ->where('cId',$contentId)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'], 'title' => $contentValue['title'], 'content'=> $contentValue['content'],'img' => $contentValue['img']));
                }
                return redirect('backend/about/content');                  
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

        return $this->set_view('backend.about.editcontent',$data);
    }

    public function content_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = AboutContentModel::find($orderValue['cId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect('backend/about/content');
    }

    /*** 沿革維護 ***/
    public function history() 
    {
        $historyList = AboutHistoryModel::with('lang')->where('is_enable',1)->orderby('order','asc')->get();
        $data = array(
            'historyList' => $historyList
        );
        return view('backend.about.history',$data);
    }

    public function addhistory(Request $request) 
    {
        $historyList = AboutHistoryModel::limit(1)->orderby('order','desc')->get();
        if($request->isMethod('post')){
            $uuid = Uuid::uuid1();
            $history = new AboutHistoryModel();
            $history->is_enable = 1;
            $history->Id = $uuid;
            $history->uuid = $uuid;            
            $history->order = $historyList[0]->order+1;
            $history->save();
            foreach ($request->history as $langKey => $langValue) {
                $lang = new AboutHistoryLangModel();
                $lang->langId = $langValue['langId'];
                $lang->hId = $uuid;
                $lang->title = $langValue['title'];
                $lang->year = $langValue['year'];
                $lang->content = html_entity_decode($langValue['content']);
                $lang->save();
            }
            return redirect('backend/about/history');            
        }

        return $this->set_view('backend.about.addhistory');
    }

    public function history_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = AboutHistoryModel::find($orderValue['hId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect('backend/about/history');
    }

    public function edithistory($historyid,Request $request) 
    {
        $content = AboutHistoryModel::with('lang')->find($historyid);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->historylangs as $contentKey => $contentValue) {     

                    $content = AboutHistoryLangModel::where('langId',$contentValue['langId'])->where('hId',$historyid)->get();
                    DB::table('tb_about_history_lang')
                    ->where('hId',$historyid)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'],'year' => $contentValue['year'], 'title' => $contentValue['title'], 'content'=> html_entity_decode($contentValue['content'])));
                }
                return redirect('backend/about/history');                  
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

        return $this->set_view('backend.about.edithistory',$data);
    }

    public function history_delete($historyid){
        $history = AboutHistoryModel::find($historyid);
        $history->is_enable = 0;
        $history->save();
        return redirect('backend/about/history');        
    }

    /**** 團隊維護 ****/
    public function team() 
    {
        $teamList = AboutTeamModel::with('lang')->where('is_enable',1)->orderby('order','asc')->get();
        $data = array(
            'teamList' => $teamList
        );
        return view('backend.about.team',$data);
    }

    public function addteam(Request $request) 
    {
        $teamList = AboutTeamModel::limit(1)->where('is_enable',1)->orderby('order','desc')->get();
        if($request->isMethod('post')){
            $uuid = Uuid::uuid1();

            //上傳圖檔
            if ($request->hasFile('img')) {
                if($request->file('img')->isValid()){
                    $destinationPath = base_path() . '/public/uploads/about/team/'.$uuid;
                    // getting image extension
                    $extension = $request->file('img')->getClientOriginalExtension();
                    
                    // uuid renameing image
                    $fileName = Str::uuid() . '_team_.' . $extension;
                
                    // move file to dest
                    $request->file('img')->move($destinationPath, $fileName);
                    // save data
                    $img = '/uploads/about/team/'.$uuid.'/'.$fileName;                             
                }
            }else{
                $img = '';
            }

            $team = new AboutTeamModel();
            $team->is_enable = 1;
            $team->Id = $uuid;
            $team->uuid = $uuid;
            $team->img = $img;
            $team->order = $teamList[0]->order+1;
            $team->save();
            foreach ($request->teamlangs as $langKey => $langValue) {
                $lang = new AboutTeamLangModel();
                $lang->langId = $langValue['langId'];
                $lang->tId = $uuid;
                $lang->title = $langValue['title'];
                $lang->name = $langValue['name'];
                $lang->content = $langValue['content'];
                $lang->save();
            }
            return redirect('backend/about/team');            
        }

        return $this->set_view('backend.about.addteam');
    }

    public function editteam($teamId,Request $request) 
    {
        $content = AboutTeamModel::with('lang')->find($teamId);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                  //上傳圖檔
                  if ($request->hasFile('img')) {
                        
                    if($request->file('img')->isValid()){
                        $destinationPath = base_path() . '/public/uploads/about/team/'.$teamId;
                        // getting image extension
                        $extension = $request->file('img')->getClientOriginalExtension();
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '_team_.' . $extension;
                    
                        // move file to dest
                        $request->file('img')->move($destinationPath, $fileName);
                        // save data
                        $img = '/uploads/about/team/'.$teamId.'/'.$fileName;                             
                    }
                }else{
                    $img = $content->img;
                }

                $content->uuid = Uuid::uuid1();
                $content->img = $img;
                $content->save();

                foreach ($request->teamlangs as $contentKey => $contentValue) {     

                    $content = AboutTeamLangModel::where('langId',$contentValue['langId'])->where('tId',$teamId)->get();

                    DB::table('tb_about_team_lang')
                    ->where('tId',$teamId)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'], 'title' => $contentValue['title'],'name' => $contentValue['name'], 'content'=> $contentValue['content']));
                }
                return redirect('backend/about/team');                  
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

        return $this->set_view('backend.about.editteam',$data);
    }

    public function team_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = AboutTeamModel::find($orderValue['tId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect('backend/about/team');
    }

    public function team_delete($teamId){
        $team = AboutTeamModel::find($teamId);
        $team->is_enable = 0;
        $team->save();
        return redirect('backend/about/team');
    }

    /*** 廠商維護 ***/
    public function partner()
    {
        $partnerList = AboutPartnerModel::with('lang')->where('is_enable',1)->orderby('order','asc')->get();
        $data = array(
            'partnerList' => $partnerList
        );
        return view('backend.about.partner',$data);
    }

    public function addpartner(Request $request) 
    {
        $uuid = Uuid::uuid1();
        
        $partnerList = AboutPartnerModel::limit(1)->orderby('order','desc')->get();
        if($request->isMethod('post')){

            //上傳圖檔
            if ($request->hasFile('img')) {
                if($request->file('img')->isValid()){
                    $destinationPath = base_path() . '/public/uploads/about/partner/'.$uuid;
                    // getting image extension
                    $extension = $request->file('img')->getClientOriginalExtension();
                    
                    // uuid renameing image
                    $fileName = Str::uuid() . '_partner_.' . $extension;
                
                    // move file to dest
                    $request->file('img')->move($destinationPath, $fileName);
                    // save data
                    $img = '/uploads/about/partner/'.$uuid.'/'.$fileName;                             
                }
            }else{
                $img = '';
            }

            $partner = new AboutPartnerModel();
            $partner->is_enable = 1;
            $partner->Id = $uuid;
            $partner->uuid = $uuid;
            $partner->img = $img;
            $partner->order = $partnerList[0]->order+1;
            $partner->save();
            foreach ($request->partnerlangs as $langKey => $langValue) {
                $lang = new AboutPartnerLangModel();
                $lang->langId = $langValue['langId'];
                $lang->pId = $uuid;
                $lang->title = $langValue['title'];
                $lang->save();
            }
            return redirect('backend/about/partner');
        }

        return $this->set_view('backend.about.addpartner');
    }

    public function editpartner($partnerid,Request $request)
    {
        $content = AboutPartnerModel::with('lang')->find($partnerid);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                //上傳圖檔
                if ($request->hasFile('img')) {
                    if($request->file('img')->isValid()){
                        $destinationPath = base_path() . '/public/uploads/about/partner/'.$partnerid;
                        // getting image extension
                        $extension = $request->file('img')->getClientOriginalExtension();
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '_partner_.' . $extension;
                    
                        // move file to dest
                        $request->file('img')->move($destinationPath, $fileName);
                        // save data
                        $img = '/uploads/about/partner/'.$partnerid.'/'.$fileName;                             
                    }
                }else{
                    $img = $content->img;
                }

                $content->uuid = Uuid::uuid1();
                $content->img = $img;
                $content->save();

                foreach ($request->partnerlangs as $contentKey => $contentValue) {     

                    $content = AboutPartnerLangModel::where('langId',$contentValue['langId'])->where('pId',$partnerid)->get();

                    DB::table('tb_about_partner_lang')
                    ->where('pId',$partnerid)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'], 'title' => $contentValue['title']));
                }
                return redirect('backend/about/partner');                  
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

        return $this->set_view('backend.about.editpartner',$data);
    }

    public function partner_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = AboutPartnerModel::find($orderValue['pId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect('backend/about/partner');
    }

    public function partner_delete($partnerId){
        $team = AboutPartnerModel::find($partnerId);
        $team->is_enable = 0;
        $team->save();
        return redirect('backend/about/partner');
    }    
}
