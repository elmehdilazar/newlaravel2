<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="font-regular relative mb-4 block w-full rounded-lg bg-blue- p-4 text-base leading-5 text-white opacity-100">An info alert for showing message.</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             <table class="table-fixed w-full border-separate border-spacing-2 border border-slate-500">
  <thead class="">
    <tr class="border p-3  border-slate-600 ">
        <th>id</th>
        <th>name</th>
        <th>action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)

    <tr class="border p-3  border-slate-600 ">
        <td class="text-center py-6">{{$category->id_cat}}</td>
        <td class="text-center ">{{ $category->name}}</td>
        <td class="text-center "> <div class="flex justify-center">
        <a  class="inline-flex items-center px-4 py-2 bg-gray-500 border mr-6 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    href="{{ route('categories.edit', ['category' => $category->id]) }}" role="button">editer</a>
                <form id="{{ $category->id }}"action=" {{ route('categories.destroy',  $category->id) }}" method="post" >
                    @csrf
                    @method('delete')
                </form>

                <button
                onclick="
                event.preventDefault();
                if(confirm('étes vous sur ?')) document.getElementById({{ $category->id }}).submit();
                "type="button" form="{{ $category->id }}"  class="inline-flex items-center px-4 py-2 ml-6 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">supprimé</button>
        </div></td>
    </tr>
    @endforeach

  </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
