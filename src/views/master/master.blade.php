<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Larape Admin Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<style>
		body{
			font-family: 'Roboto',sans-serif;
		}

		[x-cloak] {
			display: none;
		}

		.duration-300 {
			transition-duration: 300ms;
		}

		.ease-in {
			transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
		}

		.ease-out {
			transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
		}

		.scale-90 {
			transform: scale(.9);
		}

		.scale-100 {
			transform: scale(1);
		}

		.logo{
			font-family: 'Source Sans Pro', sans-serif;
		}
        .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
            @apply: bg-green-400;
            background-color: #68D391;
        }

        .dropdown{
        }
        @stack('css-style')
	</style>
    @include('vendor.admin-template.styles')
    @include('vendor.admin-template.script')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="w-full h-screen overflow-x-hidden">
	<header class="relative flex w-full h-20 bg-white shadow-sm p-5" x-data="{ isOpen:false,settingMenu:false}">
		<div class="flex-shrink justify-start inline-flex">
			<img src="{{ asset('storage/'.$template_config->company_logo) }}" alt="" class="w-auto h-10">
            @if(!$template_config->show_logo_only)
			<a href="" class="logo font-bold text-xl tracking-tight mt-1 pl-2">
                {{ $template_config->company_name_value }}
			</a>
            @endif
		</div>
		<div class="flex justify-start hidden md:block pl-16">
			<div class="relative text-gray-600 focus-within:text-gray-400">
		      <span class="absolute inset-y-0 left-0 flex items-center pl-2">
		        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
		          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
		        </button>
		      </span>
		      <input type="search" name="search" class="py-2 border-2 text-sm text-white bg-gray-200 rounded-md pl-10 w-64 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
		    </div>
		</div>
		<div class="lg:flex-no-shrink justify-end ml-auto">
			 <div class="inset-y-0 flex-shrink-0 overflow-y-auto block lg:hidden">
			    <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white" @click="isOpen = !isOpen">
			      <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			    </button>
			 </div>
			 <ul class="mr-5 hidden md:block space-x-6">
			 	<button class="text-green-600 relative align-middle rounded-md focus:outline-none" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                  </svg>
                  <!-- Notification badge -->
                  <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                </button>
				<button @click="settingMenu = !settingMenu" class="align-middle inline-flex rounded-full focus:shadow-outline-purple focus:outline-none">
					<img src="https://gravatar.com/avatar/42598cdc099613e80dd6fe274a86c9ba?s=400&d=robohash&r=x" class="rounded-full w-10 h-10 border-2 bg-white border-blue-400" alt="">
					<p class="mt-3 pl-3 text-sm">Pramudya Saputra</p>
					<svg class="fill-current h-5 w-5 mt-3 pl-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
				</button>
			</ul>
			<ul x-show="settingMenu" class="mt-4 absolute bg-white right-4 w-64 rounded shadow-md border-gray-500 border-1 space-y-1">
				<li class="hover:bg-blue-200 pl-5 pt-2 pb-2 text-sm">
					<a href="">My Profile</a>
				</li>
				<li class="hover:bg-blue-200 pl-5 pt-2 pb-2 text-sm">
					<a href="">Settings</a>
				</li>
				<li class="hover:bg-blue-200 pl-5 pt-2 pb-2 text-sm">
					<a href="">Logout</a>
				</li>
			</ul>
		</div>
	</header>

	<div class="w-screen h-screen flex bg-gray-100">
		<!--- Dekstop Sidebar --->
		<nav class="bg-white w-60 h-screen pt-5 shadow-md hidden md:block">
            <h3 class="font-semibold text-sm text-gray-600 pl-6 mt-2">Home</h3>
            @foreach($menus as $menu)
                @if($menu->has_child)
                    @include('larape::master.components.component-has-child',['menu'=>$menu])
                @else
                <ul class="mt-3 text-m">
                    <li class="group bg-teal-500 w-full p-2 hover:bg-green-400">
                        @if(Route::has($menu->route))
                            <a href="{{ route($menu->route.'.index') }}" class="inline-flex items-center w-full text-sm font-bold text-gray-800 group-hover:text-white">
                                <img class="pr-4 pl-4" src="{{ asset('storage/'.$menu->icon) }}"/>{{ $menu->name }}
                            </a>
                        @else
                            <a href="{{  url($menu->url) }}" class="inline-flex items-center w-full text-sm font-bold text-gray-800 group-hover:text-white">
                                <img class="pr-4 pl-4" src="{{ asset('storage/'.$menu->icon) }}"/>{{ $menu->name }}
                            </a>
                        @endif
                    </li>
                </ul>
                @endif
            @endforeach
            <h3 class="font-semibold text-sm text-gray-600 pl-6 mt-2">Settings</h3>
            <ul class="mt-3 text-m" x-data="{ isDropdown:false }">
                <li class="group bg-teal-500 w-full p-2 hover:bg-green-400">
                    <a href="#" @click="isDropdown = !isDropdown" class="inline-flex items-center w-full text-sm font-bold text-gray-800 group-hover:text-white">
                        <img class="pr-4 pl-4" src="https://img.icons8.com/flat_round/23/000000/settings--v1.png"/>Main Menu
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isDropdown, 'rotate-0': !isDropdown}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </li>
                <li class="group bg-teal-500 w-full p-2 dropdown" x-show="isDropdown">
                    <a href="{{ route('menu.index')  }}" @click="isDropdown = !isDropdown" class="inline-flex items-center ml-16 w-full text-sm font-medium text-gray-600 hover:text-black">
                        Menu
                    </a>
                </li>
                <li class="group bg-teal-500 w-full p-2 dropdown" x-show="isDropdown">
                    <a href="{{  route('sub_menu.index') }}" @click="isDropdown = !isDropdown" class="inline-flex items-center ml-16 w-full text-sm font-medium text-gray-600 hover:text-black">
                        Sub Menu
                    </a>
                </li>
            </ul>
		</nav>
		<!--- Mobile Sidebar -->
		<nav x-data="{ isOpen:false,settingMenu:false}" x-show="isOpen" class="relative bg-white w-60 h-screen p-6 shadow-md md:block" transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="isOpen = false" @keydown.escape="isOpen = false">
			<h3 class="font-medium text-lg">Home</h3>
			<ul class="mt-2">
				<li><a href="">Dashboard</a></li>
				<li><a href="">Dashboard</a></li>
			</ul>
		</nav>


		<!--- Content -->
		<div class="container p-8">
			@yield('content')
		</div>
	</div>

    <!--- Form For Delete Action -->
    <form action="" method="POST" id="delete-form">
        @method('DELETE')
        @csrf
    </form>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var delete_form = document.getElementById('delete-form');
        const divs = document.querySelectorAll('.action_delete');

        divs.forEach(el => el.addEventListener('click', event => {
            event.preventDefault();
            swal({
                title:"Delete This Data ?",
                text:"Once deleted cannot be retrevied ?",
                dangerMode:true,
                icon: "warning",
                buttons:['cancel','delete']
            }).then((willDelete)=>{
                if (willDelete == true) {
                    var href = event.target.href;
                    delete_form.setAttribute('action',href);
                    delete_form.submit();
                }
            });
        }));

        function deleteAction()
        {
            console.log(evt.attr('href'));
            evt.preventDefault();
            // swal({
            //     title:"Delete This Data ?",
            //     text:"Once deleted cannot be retrevied ?",
            //     dangerMode:true,
            //     icon: "warning",
            //     buttons:['cancel','delete']
            // }).then((willDelete)=>{
            //     if (willDelete == true) {
            //         var href = $(this).attr('href');
            //         $('#delete-form').attr('action',href).submit();
            //     }
            // });
        }
    </script>
    @stack('js-script')
</body>
</html>
