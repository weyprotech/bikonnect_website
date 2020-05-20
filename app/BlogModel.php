<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'tb_blog';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','order','updated_at','created_at'];
    public $incrementing = false;

    public function bloglang(){
        return $this->hasMany(BlogLangModel::class,'bId','Id');
    }
    
    public function blogcategory(){

        // return $this->hasManyThrough('App\BlogCategoryModel','App\BlogCategoryLangModel','cId','Id','categoryId');
        
        return $this->hasOne(BlogCategoryModel::class,'Id','categoryId');
    }

    public function blogcomment(){
        return $this->hasMany(BlogCommentModel::class,'bId','Id');
    }
}
