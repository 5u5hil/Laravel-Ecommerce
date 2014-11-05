<?php

class AttributeSetsController extends BaseController {

    public function index() {
        $attr_sets = Helper::tables_data('AttributeSet', 'attr_set', '', '', 5);
        return View::make(Config::get('constants.attrSetsView') . '.index', compact('attr_sets'));
    }

    public function add() {
        $attr_sets = new AttributeSet;
        $action = URL::route('saveAttrSet');
        return View::make(Config::get('constants.attrSetsView') . '.addEdit', compact('attr_sets', 'action'));
    }

    public function edit() {
        $attr_sets = AttributeSet::find(Input::get('id'));
        $action = URL::route('updateAttrSet');
        return View::make(Config::get('constants.attrSetsView') . '.addEdit', compact('attr_sets', 'action'));
    }

    public function save() {
        $attr_sets = AttributeSet::create(Input::all());
        return Redirect::route("attrsets");
    }

    public function update() {
        $attr_sets = AttributeSet::find(Input::get('id'));
        $attr_sets->fill(Input::all())->save();
        return Redirect::route("attrsets");
    }

    public function delete() {
        $attr_sets = AttributeSet::find(Input::get('id'));
        $attr_sets->delete();
        $attr_sets->attributes()->detach();
        return Redirect::route("attrsets");
    }

}
