<?php
namespace App\Models\Admin\Menu;

use CodeIgniter\Model;

class MenuChildrenModel extends Model {
    protected $table = 'MENU_CHILDREN';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
}
?>