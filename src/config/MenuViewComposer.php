<?php
namespace Larape\Admin_template\config;


use Illuminate\View\View;
use Larape\Admin_template\Models\Menu;

class MenuViewComposer
{
    public function compose(View $view)
    {
        $menus = Menu::with('sub_menus')->get();
        $view->with('menus',$menus);
    }
}
