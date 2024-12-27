<?php

use App\Models\Admin\Menu\MenuChildrenModel;
use App\Models\Admin\Menu\MenuGroupsModel;
use App\Models\Admin\Menu\MenuModel;

if (! function_exists('get_menu_list')) {
    function get_menu_list()
    {
        $model_menu_groups = new MenuGroupsModel();
        $menu_groups = $model_menu_groups->orderBy('ORDER', 'ASC')->findAll();

        $model_menu = new MenuModel();
        $menu_list = $model_menu->findAll();

        $model_menu_children = new MenuChildrenModel();
        $menu_children = $model_menu_children->findAll();
        $menu_children = set_array_group_key('MENU_ID', $menu_children);

        $full_current_uri = uri_string();
        $current_url = explode('/', $full_current_uri);

        # assign children to parent menu
        foreach ($menu_list as $ml_key => $menu_data) {
            # check if parent menu should be active based on uri
            $menu_list[$ml_key]['ACTIVE'] = '/' . $current_url[0] . '/' . $current_url[1] == $menu_list[$ml_key]['ROUTE'] ? true : false;
            $menu_list[$ml_key]['CHILDREN'] = [];

            if (isset($menu_children[$menu_data['ID']]) && ! empty($menu_children[$menu_data['ID']])) {
                foreach ($menu_children[$menu_data['ID']] as $mc_key => $child_menu_info) {
                    # check if menu child should be active based on uri
                    $child_menu_info['ACTIVE'] = false;
                    if (isset($current_url[2])) {
                        $child_menu_info['ACTIVE'] = '/' . $full_current_uri == $menu_list[$ml_key]['ROUTE'] . $child_menu_info['ROUTE'] ? true : false;
                    }

                    $menu_list[$ml_key]['CHILDREN'][] = $child_menu_info;
                }
            }
        }

        $menu_list = set_array_group_key('GROUP_ID', $menu_list);

        # assign menu to group
        $final_list = [];
        foreach ($menu_groups as $mg_key => $group_info) {
            if (! isset($final_list[$group_info['ID']])) {
                $final_list[$group_info['ID']] = [
                    'group_id' => $group_info['ID'],
                    'group_name' => $group_info['NAME'],
                    'menu_list' => $menu_list[$group_info['ID']]
                ];
            }
        }

        return $final_list;
    }
}
