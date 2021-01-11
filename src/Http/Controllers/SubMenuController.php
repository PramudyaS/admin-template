<?php

namespace Larape\Admin_template\Http\Controllers;

use App\Http\Controllers\Controller;
use Larape\Admin_template\Models\Menu;
use Larape\Admin_template\Models\SubMenu;
use Illuminate\Http\Request;


class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_menus = SubMenu::with('menu')->paginate(10);
        return view('larape::pages.sub_menu.index',compact('sub_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('larape::pages.sub_menu.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_menu = new SubMenu();
        $sub_menu->name         = $request->name;
        $sub_menu->url          = $request->url;
        $sub_menu->route        = $request->route;
        $sub_menu->description  = $request->description;
        $sub_menu->menu_id      = $request->menu_id;
        $sub_menu->save();

        return redirect()->route('sub_menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function show(SubMenu $subMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_menu = SubMenu::find($id);
        $menus = Menu::all();

        return view('larape::pages.sub_menu.edit',compact('sub_menu','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $sub_menu = SubMenu::find($id);
        $sub_menu->name         = $request->name;
        $sub_menu->url          = $request->url;
        $sub_menu->route        = $request->route;
        $sub_menu->description  = $request->description;
        $sub_menu->menu_id      = $request->menu_id;
        $sub_menu->update();

        return redirect()->route('sub_menu.index')->withMessage('Success Update Sub Menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_menu = SubMenu::find($id);
        $sub_menu->delete();

        return back()->withMessage('Success Delete Sub Menu');
    }
}
