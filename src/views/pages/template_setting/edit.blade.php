@extends('larape::master.master')

@section('content')
    <div class="bg-white shadow-md mt-2 px-4 py-4 rounded-md">
        <div class="card-header pb-2">
            <h3 class="font-bold text-lg w-full">Form Template Setting</h3>
            <p class="w-full text-gray-500 font-thin">Please Fill All Field</p>
            <hr class="border-gray-200 my-1 border-bottom-none mt-4">
        </div>
        <div class="card-body w-full pt-1">
            <form action="{{  route('template_setting.update',1)  }}" class="space-y-2" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="flex space-x-3 ">
                    <div class="w-1/2">
                        <label for="" class="w-full">Company Name</label>
                        <input type="text" name="company_name" class="w-full border-2 px-3 py-2 rounded-sm">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">Logo</label>
                        <input type="file" name="logo" class="w-full border-2 px-3 py-1 rounded-sm">
                    </div>
                </div>
                <div class="flex space-x-3">
                    <div class="w-1/2">
                        <label for="" class="w-full">Base Color</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="base_color" value="personal">
                                <span class="ml-2">White (Default)</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="base_color" value="busines">
                                <span class="ml-2">Blue</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="" class="w-full">Dark Mode</label>
                        <div class="relative mt-1 w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" name="dark_mode" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                            <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                        <label for="toggle" class="text-xs text-gray-700">Not Active</label>
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 px-3 py-2 text-white rounded-sm shadow-md hover:bg-blue-600">Save Configuration</button>
            </form>
        </div>
    </div>
@endsection
