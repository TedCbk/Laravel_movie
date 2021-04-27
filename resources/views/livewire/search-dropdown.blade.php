    <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
        {{-- Using a wire model such as v-model, debounce 500ms to make the results appears after typing --}}
        <input wire:model.debounce.500ms="search" type="text"
            class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
            placeholder="Search (Press '/' to focus)"
            x-ref="search"
            @keydown.window="
                if(event.keyCode === 191){
                    event.preventDefault();
                    $refs.search.focus();
                }
            "
            @focus="isOpen = true"
            @keydown="isOpen = true"
            @keydown.escape.window="isOpen = false"
            @keydown.shift.tab="isOpen = false"
            >
        <div class="absolute top-0">
            <i class="fas fa-search w-4 mt-2 ml-2 fill-current text-gray-500"></i>
        </div>
        <div wire:loading class="spinner top-0 right-0 mt-1">
          <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>  
        </div>        
        @if (strlen($search) > 2)
            <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4"
            x-show.transition.opacity="isOpen"
             >
                @if ($searchResults->count() > 0)
                    <ul>
                        @foreach ($searchResults as $result)
                            <li class="border-b border-gray-700">
                                <a 
                                href="{{ route('movies.show', $result['id']) }}"
                                    class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                                    @if ($loop->last)
                                        @keydown.tab="isOpen = false"
                                    @endif
                                    >                                    
                                    @if ($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}"
                                            alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/58x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['title'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="px-3 py-3">No results for "{{ $search }}"</div>
                @endif
            </div>
        @endif
    </div>
