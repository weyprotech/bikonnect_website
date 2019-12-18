<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;
use App\ContactModel;
use App\ContactLangModel;
use App\ContactMailModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\responseEmail;
use App\EmailModel;


class ContactController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id,Request $request)
    {
        $content = ContactModel::with('contactlang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = ContactLangModel::where('cId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->cId = $Id;                    
                    $lang->address = $langValue['address'];
                    $lang->email = $langValue['email'];
                    $lang->phone = $langValue['phone'];
                    $lang->map = $langValue['map'];
                    $lang->fax = $langValue['fax'];
                    $lang->save();
                }
                return redirect(action('Backend\ContactController@edit',[$Id]));              
            }
        }

        //讀出語系資料
        foreach ($content->contactlang as $contactKey => $contactValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($contactValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $contactValue;
                }
            }
        }
        
        $data = array(
            'content' => $content,
            'langdata' => $langdata
        );
        return $this->set_view('backend.contact.edit',$data);
    }

    //聯絡我們信件列表
    public function contact_mail(){
        $mailList = ContactMailModel::where('is_enable',1)->orderby('updated_at','desc')->get();
        $data = array(
            'mailList' => $mailList
        );
        return $this->set_view('backend.contact.mail.index',$data);
    }

    //顯示信件
    public function show_mail($id){
        $mail = ContactMailModel::find($id);
        $data = array(
            'mail' => $mail
        );
        return $this->set_view('backend.contact.mail.edit',$data);
    }

    //顯示信件
    public function delet_mail($id){
        $mail = ContactMailModel::find($id);
        $mail->is_enable = 0;
        $mail->save();

        return redirect(action('Backend\ContactController@contact_mail'));
    }

    //回覆信件
    public function response_mail($id,Request $request){
        $contact = ContactMailModel::find($id);
        
        if($request->isMethod('post')){
            $data = array(
                'content' => $request->content
            );
            Mail::to($contact->email)->send(new responseEmail($data));            
        }
        $contact->response = $request->content;
        $contact->save();

        $data = array(
            'id' => $id,
            'contact' => $contact
        );

        return $this->set_view('backend.contact.mail.response',$data);
    }

    //信箱頁面
    public function email_index(){
        $contentList = EmailModel::where('is_enable',1)->get();
        $data = array(
            'contentList' => $contentList
        );
        return $this->set_view('backend.contact.email.index',$data);
    }

     /**     
     * 信箱新增
     * @param Request $request
     * 
     * 
     */
    public function email_add(Request $request){
        if($request->isMethod('post')){
            $id = preg_replace('/\./', '', uniqid('email',true));
            $email = new EmailModel();
            $email->is_enable = 1;
            $email->Id = $id;
            $email->email = $request->email;
            $email->save();         
            return redirect(action('Backend\ContactController@email_index'));
        }

        return $this->set_view('backend.contact.email.add');
    }

    /**     
     * 信箱編輯
     * @param int $id,Request $request
     * 
     * 
     */
    public function email_edit($id,Request $request){
        $email = EmailModel::find($id);
        if($request->isMethod('post')){
            $email->email = $request->email;
            $email->save();
        }
        $data = array(
            'email' => $email
        );

        return $this->set_view('backend.contact.email.edit',$data);
    }

    /**
     * 信箱刪除
     * @param int $id
     * 
     */
    public function email_delete($id){
        $email = EmailModel::find($id);
        $email->is_enable = 0;
        $email->save();
        return redirect(action('Backend\ContactController@email_index'));        
    }
}
