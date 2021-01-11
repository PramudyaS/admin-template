@extends('larape::master.master')

@section('content')
    <div class="bg-white shadow-md mt-2 px-4 py-4 rounded-md">
        <div class="card-header pb-2">
            <h3 class="font-bold text-lg w-full">Form Sub Menu</h3>
            <p class="w-full text-gray-500 font-thin">Please fill all field with mark (*)</p>
            <hr class="border-gray-200 my-1 border-bottom-none mt-4">
        </div>
        <div class="card-body w-full pt-1">
            <form action="{{  route('sub_menu.update',$sub_menu->id)  }}" class="space-y-2" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="flex space-x-3 ">
                    <div class="w-1/2">
                        <label for="" class="w-full">Name *</label>
                        <input type="text" name="name" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off" value="{{  $sub_menu->name }}">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">URL *</label>
                        <input type="text" name="url" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off" value="{{  $sub_menu->url }}">
                    </div>
                </div>
                <div class="flex space-x-3 ">
                    <div class="w-1/2">
                        <label for="" class="w-full">Route</label>
                        <input type="text" name="route" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off" value="{{  $sub_menu->route }}">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">Parent Menu</label>
                        <div class="relative inline-block w-full text-gray-700">
                            <select name="menu_id" class="w-full h-11 pl-3 pr-6 text-base placeholder-gray-600 border-2 appearance-none focus:shadow-outline" placeholder="Regular input">
                                <option>Select Menu</option>
                                @foreach($menus as $menu)
                                    <option value="{{  $menu->id  }}" {{ $menu->id == $sub_menu->menu_id ? 'selected' : ''  }}>{{  $menu->name  }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <div class="w-full">
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off">{{  $sub_menu->description }}</textarea>
                    </div>
                </div>
                <a href="{{  route('sub_menu.index') }}" class="px-3 py-2.5 text-black border-2 border-gray-300 rounded-sm shadow-md hover:bg-white hover:border-blue-300">Cancel</a>
                <button type="submit" class="bg-blue-500 px-3 py-2 text-white rounded-sm shadow-md hover:bg-blue-600">Update Sub Menu</button>
            </form>
        </div>
    </div>
@endsection
