<?php

class Attribute extends \Eloquent {

    protected $fillable = ['attr', 'desc', 'attr_type','attr_values'];

    public function attributesets() {
        return $this->belongsToMany('AttributeSet', 'has_attributes', 'attr_id', 'attr_set');
    }

}
