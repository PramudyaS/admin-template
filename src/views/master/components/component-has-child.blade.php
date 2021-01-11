<ul class="mt-3 text-m" x-data="{ {{  $menu->name_properties  }}:false }">
    <li class="group bg-teal-500 w-full p-2 hover:bg-green-400">
        <a href="#" @click="{{ $menu->name_properties  }} = !{{ $menu->name_properties  }}" class="inline-flex items-center w-full text-sm font-bold text-gray-800 group-hover:text-white">
            <img class="pr-4 pl-4" src="{{  asset('storage/'.$menu->icon)  }}"/>{{ $menu->name }}
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': {{ $menu->name_properties }}, 'rotate-0': !{{ $menu->name_properties }}}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </li>
    @foreach($menu->sub_menus as $sub_menu)
    <li class="group bg-teal-500 w-full p-2 dropdown" x-show="{{ $menu->name_properties }}">
        @if(Route::has($menu->route))
        <a href="{{ route($sub_menu->route.'index')  }}" @click="{{ $menu->name_properties }} = !{{ $menu->name_properties }}" class="inline-flex items-center ml-16 w-full text-sm font-medium text-gray-600 hover:text-black">
           {{  $sub_menu->name }}
        </a>
        @else
        <a href="{{  url($sub_menu->url) }}" @click="{{ $menu->name_properties }} = !{{ $menu->name_properties }}" class="inline-flex items-center ml-16 w-full text-sm font-medium text-gray-600 hover:text-black">
            {{  $sub_menu->name }}
        </a>
        @endif
    </li>
    @endforeach
</ul>
