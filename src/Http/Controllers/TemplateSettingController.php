<?php

namespace Larape\Admin_template\Http\Controllers;

use Larape\Admin_template\Models\TemplateSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Larape\Admin_template\Models\StoreImage;

class TemplateSettingController extends Controller
{
    use StoreImage;

   public function __invoke($id = 1)
   {
        return view('larape::pages.template_setting.edit');
   }

   public function update(Request $request ,$id = 1)
   {
       $logo = $this->updateImageAndDelete($request,'logo','template','');

        TemplateSetting::updateOrCreate(['id'=> $id],[
            'company_name'  => $request->company_name,
            'logo'          => $logo,
            'base_color'    => $request->base_color,
            'dark_mode'     => 0
        ]);

        return back()->withMessage('Success Update Template Configuration');
   }
}
