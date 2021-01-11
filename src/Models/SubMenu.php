<?php

namespace Larape\Admin_template\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Larape\Admin_template\Models\Menu;

class SubMenu extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
