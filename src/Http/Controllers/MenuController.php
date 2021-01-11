<?php

namespace Larape\Admin_template\Http\Controllers;


use Larape\Admin_template\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Larape\Admin_template\Models\StoreImage;


class MenuController extends Controller
{
    use StoreImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('larape::pages.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('larape::pages.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $icon = $this->storeImageIfExist($request, 'icon', 'menu/icon');

        $menu = new Menu();
        $menu->name         = $request->name;
        $menu->url          = $request->url;
        $menu->route        = $request->route;
        $menu->prefix       = $request->prefix;
        $menu->icon         = $icon;
        $menu->description  = $request->description;
        $menu->has_child    = $request->has_child;
        $menu->save();

        return redirect()->route('menu.index')->withMessage('Success Create New Menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('larape::pages.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $icon = $this->updateImageAndDelete($request, 'icon', 'menu/icon', $menu->icon);

        $menu->name         = $request->name;
        $menu->url          = $request->url;
        $menu->route        = $request->route;
        $menu->prefix       = $request->prefix;
        $menu->icon         = $icon;
        $menu->description  = $request->description;
        $menu->has_child    = $request->has_child;
        $menu->update();

        return redirect()->route('menu.index')->withMessage('Success Update Menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $this->deleteImage($menu->icon);
        $menu->delete();

        return back()->withMessage('Success Delete Menu');
    }
}
