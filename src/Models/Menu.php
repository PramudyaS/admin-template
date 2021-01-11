<?php

namespace Larape\Admin_template\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Larape\Admin_template\Models\SubMenu;

class Menu extends Model
{
    use HasFactory;

    public function getNamePropertiesAttribute()
    {
        return str_replace(' ','_',strtolower($this->name));
    }

    public function sub_menus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
