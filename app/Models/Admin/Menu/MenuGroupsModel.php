<?php
namespace App\Models\Admin\Menu;

use CodeIgniter\Model;

class MenuGroupsModel extends Model {
    protected $table = 'menu_groups';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
}
?>