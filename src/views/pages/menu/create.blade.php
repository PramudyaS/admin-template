@extends('larape::master.master')

@section('content')
    <div class="bg-white shadow-md mt-2 px-4 py-4 rounded-md">
        <div class="card-header pb-2">
            <h3 class="font-bold text-lg w-full">Form Menu Setting</h3>
            <p class="w-full text-gray-500 font-thin">Please fill all field with mark (*)</p>
            <hr class="border-gray-200 my-1 border-bottom-none mt-4">
        </div>
        <div class="card-body w-full pt-1">
            <form action="{{  route('menu.store')  }}" class="space-y-2" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex space-x-3 ">
                    <div class="w-1/2">
                        <label for="" class="w-full">Name *</label>
                        <input type="text" name="name" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">URL *</label>
                        <input type="text" name="url" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off">
                    </div>
                </div>
                <div class="flex space-x-3 ">
                    <div class="w-1/2">
                        <label for="" class="w-full">Route</label>
                        <input type="text" name="route" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">Prefix</label>
                        <input type="text" name="prefix" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off">
                    </div>
                </div>
                <div class="flex space-x-3 ">
                    <div class="w-1/2">
                        <label for="" class="w-full">Icon</label>
                        <input type="file" name="icon" class="w-full border-2 px-3 py-1 rounded-sm">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">Has Child</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="has_child" value="1">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="has_child" value="0">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <div class="w-full">
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="w-full border-2 px-3 py-2 rounded-sm" autocomplete="off"></textarea>
                    </div>
                </div>
                <a href="{{  route('menu.index') }}" class="px-3 py-2.5 text-black border-2 border-gray-300 rounded-sm shadow-md hover:bg-white hover:border-blue-300">Cancel</a>
                <button type="submit" class="bg-blue-500 px-3 py-2 text-white rounded-sm shadow-md hover:bg-blue-600">Save Menu</button>
            </form>
        </div>
    </div>
@endsection
