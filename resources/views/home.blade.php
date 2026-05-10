<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home Page') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <a
            class=" underline hover:text-blue-500"
            href="/businesses/create">Create Business</a>
    </div>

</x-app-layout>
