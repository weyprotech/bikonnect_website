<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogLangModel extends Model
{
    protected $table = 'tb_blog_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId', 'langId', 'title' , 'description', 'content', 'updated_at', 'created_at'];

    public function blog(){
        return $this->belongsTo(BlogModel::class);
    }
}
