<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogCommentModel;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param var $bId
     * @return \Illuminate\Http\Response
     */
    public function index($bId)
    {
        $commentList = BlogCommentModel::where('bId',$bId)->with(['getblog','getblog.bloglang' => function($query){
            $query->where('langId',1);
        }])->get();

        $data = array(
            'bId' => $bId,
            'commentList' => $commentList
        );

        return $this->set_view('backend.blog.comment.index',$data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function response($Id,Request $request)
    {
        $comment = BlogCommentModel::with(['getblog','getblog.bloglang' => function($query){
            $query->where('langId',1);
        }])->find($Id);

        if($request->isMethod('post')){            
            $comment->response = $request->response;
            $comment->response_date = date('Y-m-d');
            $comment->save();
            return redirect(action('Backend\BlogCommentController@index',[$comment->bId]));
        }

        $data = array(
            'comment' => $comment
        );
        
        return $this->set_view('backend.blog.comment.response',$data);
    }
}
