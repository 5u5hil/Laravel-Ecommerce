<?php

class Helper {

    public static function tables_data($table_name, $sort_field = "", $sort_order = "ASC", $search_parameters = "", $no_of_rows = "10") {
        $data = $table_name::orderBy($sort_field, $sort_order)->paginate($no_of_rows);
        return $data;
    }

    public static function searchForKey($keyy, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$keyy] == $value) {
                return TRUE;
            }
        }
        return FALSE;
    }

}
