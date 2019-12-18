<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCommentModel extends Model
{
    protected $table = 'tb_blog_comment';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','name','message','response','updated_at','created_at'];

    public function blog(){
        $this->belongsTo(BlogModel::class);
    }

    public function getblog(){
        return $this->hasone(BlogModel::class,'Id','bId');
    }
}
