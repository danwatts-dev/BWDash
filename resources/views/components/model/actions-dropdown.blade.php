<div x-data="actionDropdown()" class="w-full relative flex">
    <button x-bind="trigger" type="button" class="ml-auto hover:text-blue-500"><i class="far fa-caret-square-down fa-lg"></i></button>
    <div x-show="open" class="absolute right-0 bg-white shadow-lg rounded border z-10">
        <ul>
            <li class="flex items-center px-4 py-1 hover:bg-blue-50"><i class="mr-2 far fa-edit"></i><button>Edit</button></li>
            <li class="flex items-center px-4 py-1 hover:bg-blue-50"><i class="mr-2 far fa-trash-alt"></i><button>Delete</button></li>
        </ul>
    </div>
</div>
