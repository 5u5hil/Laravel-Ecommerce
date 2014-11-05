<?php

class AttributeSet extends Eloquent {

    protected $fillable = ['attr_set'];
    protected $table = 'attribute_sets';

    public function attributes() {
        return $this->belongsToMany('Attribute', 'has_attributes', 'attr_set', 'attr_id');
    }
    
    public function products() {
         return $this->hasMany('Product','attr_set');
    }

}
