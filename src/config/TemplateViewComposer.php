<?php

namespace Larape\Admin_template\config;

use Illuminate\View\View;
use Larape\Admin_template\Models\TemplateSetting;

class TemplateViewComposer
{
    public function compose(View $view)
    {
        $config = TemplateSetting::find(1);

        if (is_null($config)){
            $config = new TemplateSetting();
            $config->getCompanyLogoAttribute = '';
            $config->getCompanyNameValueAttribute = 'LARAPE';
        }

        $view->with('template_config',$config);
    }
}
