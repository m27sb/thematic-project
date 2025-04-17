<div>
    @if($popup)
    <div class="absolute bg-white border rounded-lg shadow-lg w-64 left-0 top-full">
        <div class="p-2">
            @if(count($results) > 0)
                @foreach($results as $user)
                    <a href="{{ route('profile', $user->username) }}" class="block px-4 py-2 hover:bg-gray-100">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="h-8 w-8 rounded-full object-cover mr-2">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p class="text-gray-500 text-sm text-center">No results found</p>
            @endif
        </div>
    </div>
    @endif
</div>
