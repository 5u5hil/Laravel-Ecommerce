<?php

class Product extends \Eloquent {

    protected $fillable = ["prod_type","attr_set","product","is_individual"];

    public function categories() {
        return $this->belongsToMany('Category', 'has_categories', 'prod_id', 'cat_id');
    }

    public function attributeset() {
        return $this->belongsTo('AttributeSet', 'attr_set');
    }

    public function producttype() {
        return $this->belongsTo('ProductType', 'prod_type');
    }

}
