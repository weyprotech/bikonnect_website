<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryLangModel extends Model
{
    protected $table = 'tb_blog_category_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','img','content','updated_at','created_at'];

    public function blogcategory(){
        $this->belongsTo(BlogCategoryModel::class);
    }
}
