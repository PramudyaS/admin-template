@extends('larape::master.master')

@section('content')
    <div class="inline-flex">
        <div class="w-full">
            <h3 class="font-bold text-lg w-full">Menu Setting</h3>
            <p class="w-full text-gray-500 font-thin">Data All Menu Setting</p>
        </div>
        <a href="{{ route('menu.create') }}" class="bg-blue-500 px-2 right-5 absolute inline-flex py-3 pt-3 text-white text-sm rounded-md border-blue-50 hover:bg-blue-600 text-center align-middle inline-block content-center">Create Menu <img class="ml-1" src="https://img.icons8.com/metro/20/ffffff/plus.png"/></a>
    </div>
    <div class="bg-white shadow-md rounded-sm w-full p-3 mt-5">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-1/2 py-4 overflow-hidden">
                <div class="flex justify-between">
                    <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                        <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                            <div class="flex">
                                    <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                        <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                            </div>
                            <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-middle inline-block min-w-full overflow-hidden pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 tracking-wider">No</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4  tracking-wider">Name</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4  tracking-wider">URL</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Prefix</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Description</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Has Child</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                    @forelse($menus as $menu)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800">{{  $loop->index + 1  }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{   $menu->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{  $menu->route }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{  $menu->prefix }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                <div class="text-sm leading-5 text-blue-900">{{   $menu->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                                <div class="text-sm leading-5 text-blue-900">{{   $menu->has_child }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                <a href="{{ route('menu.destroy',$menu->id)  }}" class="px-5 py-2 border-gray-200 border bg-red-500 inline-flex text-blue-500 rounded-full transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none action_delete">
                                    <img src="https://img.icons8.com/metro/15/ffffff/trash.png"/>
                                </a>
                                <a href="{{  route('menu.edit',$menu->id)  }}" class="px-5 py-2 bg-blue-500 rounded-full inline-flex text-white transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                                    <img src="https://img.icons8.com/metro/15/ffffff/pencil.png"/>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500" colspan="7">
                                <div class="text-sm leading-5 text-blue-900 text-center">Data Empty</div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                    <div>
                        <p class="text-sm leading-5 text-blue-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">200</span>
                            of
                            <span class="font-medium">2000</span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex shadow-sm">
                            <div>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <a href="#" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                                    1
                                </a>
                                <a href="#" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                                    2
                                </a>
                                <a href="#" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                                    3
                                </a>
                            </div>
                            <div v-if="pagination.current_page < pagination.last_page">
                                <a href="#" class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

