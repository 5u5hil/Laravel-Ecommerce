<?php

class AttributesController extends BaseController {

    public function index() {
        $attrs = Helper::tables_data('Attribute', 'attr', '', '', 5);
        return View::make(Config::get('constants.attrView') . '.index', compact('attrs'));
    }

    public function add() {
        $attr = new Attribute;
        $attr_sets = AttributeSet::all();
        $attr_types = AttributeType::all();
        $action = URL::route('saveAttr');
        return View::make(Config::get('constants.attrView') . '.addEdit', compact('attr', 'attr_sets', 'attr_types', 'action'));
    }

    public function edit() {
        $attr = Attribute::find(Input::get('id'));
        $attr_sets = AttributeSet::all();
        $attr_types = AttributeType::all();
        $action = URL::route('updateAttr');
        return View::make(Config::get('constants.attrView') . '.addEdit', compact('attr', 'attr_sets', 'attr_types', 'action'));
    }

    public function save() {
        $attr = Attribute::create(Input::except('attr_set'));

        if (!empty(Input::get('attr_set')))
            $attr->attributesets()->sync(Input::get('attr_set'));


        return Redirect::route("attrs");
    }

    public function update() {
        $attr = Attribute::find(Input::get('id'));
        $attr->fill(Input::except('attr_set'))->save();
        if (!empty(Input::get('attr_set')))
            $attr->attributesets()->sync(Input::get('attr_set'));
        else
            $attr->attributesets()->detach();

        return Redirect::route("attrs");
    }

    public function delete() {
        $attr = Attribute::find(Input::get('id'));
        $attr->delete();
        $attr->attributesets()->detach();
        return Redirect::route("attrs");
    }

}
