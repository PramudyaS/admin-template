<?php

namespace Larape\Admin_template\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCompanyNameValueAttribute()
    {
        return $this->company_name == null ? 'Larape' : $this->company_name;
    }

    public function getCompanyLogoAttribute()
    {
        return $this->logo == null ? '' : $this->logo;
    }
}
