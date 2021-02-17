<div>
    <div class="max-w-2xl mx-4 sm:mx-auto py-10 sm:px-6 lg:px-8">
        @include('partials.messages')

        @if($success)
            <div class="bg-green-100 border border-gren-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                User successfully saved
            </div>
        @endif

        <form wire:submit.prevent="submit" {{--method="POST" action="{{ route('users.update',$user->id) }}"--}}>
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input wire:model.lazy="user.name" type="text" {{--name="name" --}}id="name" value="{{$user->name}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('user.name')
                <span class="text-red-700" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input wire:model.lazy="user.email" type="text" {{--name="email"--}} id="email" value="{{$user->email}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                </div>
                @error('user.email')
                <span class="text-red-700" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Save/Cancel --}}
            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>
