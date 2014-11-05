<?php

class CategoryController extends BaseController {

    public function index() {
        $categories = Helper::tables_data('Category', 'category', '', '', 5);
        return View::make('theSoul.pages.catalog.category.index', compact('categories'));
    }

    public function sort() {
        $categories = Helper::tables_data('Category', $field, $order, '', 5);
        return View::make('theSoul.pages.category', compact('categories'));
    }

    public function search() {

        // $categories = Search::search('content', 'update', array('fuzzy'=>true))->get();
        $categories = Search::index('categories')->search('category', 'men')->get();
        // $categories = Helper::tables_data('Category', $field, $order, $search_parameter, 5);
        return View::make('theSoul.pages.category', compact('categories'));
    }

    public function add() {
        $category = new Category;
        $action = URL::route('saveCat');
        return View::make('theSoul.pages.catalog.category.addEdit', compact('category', 'action'));
    }

    public function edit() {

        $category = Category::find(Input::get('id'));
        $action = URL::route('updateCat');
        return View::make('theSoul.pages.catalog.category.addEdit', compact('category', 'action'));
    }

    public function save() {

        $category = Category::create(Input::except('images','imgs'));
        $catImgs = [];

        $destinationPath = public_path() . '/theSoul/uploads/catalog/category/';

        if (Input::hasFile('images')) {
            $i = 1;
            foreach (Input::file("images") as $file) {
                $fileName = date("YmdHis") . "-$i" . "." . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $fileName);
                if ($upload_success) {
                    array_push($catImgs, $fileName);
                    $i++;
                }
            }
        }

        $category->images = json_encode($catImgs);
        $category->update();

        if (!empty(Input::get("parent_id")))
            $category->makeChildOf(Input::get("parent_id"));

        return Redirect::route("category");
    }

    public function update() {
        $category = Category::find(Input::get('id'));
        $category->fill(Input::except('images', 'imgs'))->save();


        $catImgs = json_decode(empty(Input::get('imgs')) ? "[]" : Input::get('imgs'), true);

        $destinationPath = public_path() . '/theSoul/uploads/catalog/category/';

        if (Input::hasFile('images')) {
            $i = 1;
            foreach (Input::file("images") as $file) {
                $fileName = date("YmdHis") . "-$i" . "." . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $fileName);
                if ($upload_success) {
                    array_push($catImgs, $fileName);
                    $i++;
                }
            }
        }

        $category->images = json_encode($catImgs);
        $category->update();

        if (!empty(Input::get("parent_id")))
            $category->makeChildOf(Input::get("parent_id"));
        else
            $category->makeRoot();

        return Redirect::route("category");
    }

    public function delete() {
        $category = Category::find(Input::get('id'));
        $category->delete();
        return Redirect::route("category");
    }

}
