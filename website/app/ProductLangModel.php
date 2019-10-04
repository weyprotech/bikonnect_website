<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLangModel extends Model
{
    protected $table = 'tb_product_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','pId','langId','title','meta_title','meta_description','meta_keywords','title_1','content_1','img_1','title_2','content_2','img_2','title_3','content_3','img_3','title_4','content_4','img_4','updated_at'];
}
