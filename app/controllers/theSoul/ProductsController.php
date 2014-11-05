<?php

class ProductsController extends BaseController {

    public function index() {
        $prods = Product::where('is_individual', '=', '1')
                ->where("is_crowd_funded", "=", "0")
                ->orderBy("product", "asc")
                ->paginate(Config::get('constants.paginateNo'));

        return View::make(Config::get('constants.prodView') . '.index', compact('prods'));
    }

    public function add() {
        $prod_types = ProductType::all();
        $attr_sets = AttributeSet::all();
        $action = URL::route('saveProd');
        return View::make(Config::get('constants.prodView') . '.add', compact('prod_types', 'attr_sets', 'action'));
    }

    public function edit() {
        $prod = Product::find(Input::get('id'));
        $action = URL::route('updateProd');
        return View::make(Config::get('constants.prodView') . '.addEdit', compact('prod', 'action'));
    }

    public function save() {
        $prod = Product::create(Input::all());
        return Redirect::route("editProd2");
    }

    public function update() {
        $prod = Product::find(Input::get('id'));
        $prod->fill(Input::all())->save();
        return Redirect::route("products");
    }

    public function delete() {
        $prod = Product::find(Input::get('id'));
        $prod->delete();
        $prod->attributes()->detach();
        return Redirect::route("products");
    }

}
