<x-app-layout>
    Blog Administration
    <a href="{{ route('admin.categories.index') }}" class="text-gray-700 bg-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Category List</a>    
    <a href="{{ route('admin.tags.index') }}" class="text-gray-700 bg-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Tag List</a>        
    <a href="{{ route('admin.posts.index') }}" class="text-gray-700 bg-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Posts List</a>        
</x-app-layout>