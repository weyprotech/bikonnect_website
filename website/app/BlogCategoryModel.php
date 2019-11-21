<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryModel extends Model
{
    protected $table = 'tb_blog_category';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','Id','is_visible','uuid','updated_at','created_at'];
    public $incrementing = false;

    public function blogcategorylang(){
        return $this->hasMany(BlogCategoryLangModel::class,'cId','Id');
    }
}
