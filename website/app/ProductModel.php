<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'tb_product';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','order','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(ProductLangModel::class,'pId','Id')->orderby('langId','asc');
    }
}
