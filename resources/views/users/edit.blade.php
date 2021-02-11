<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

   {{-- @livewire('user-profile')--}}

    @livewire('user-profile', ['user' => $user])
</x-app-layout>