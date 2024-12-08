<?php
namespace App\Models\Admin\Menu;

use CodeIgniter\Model;

class MenuChildrenModel extends Model {
    protected $table = 'menu_children';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
}
?>