<?php
if( ! function_exists('set_array_key') ) {
    function set_array_key ( $key, $array ) {
        $fin_list = [];
        
        foreach ($array as $array_key => $value) {
            $fin_list[ $value[$key] ][] = $value;
        }
        
        return $fin_list;
    }
}
?>