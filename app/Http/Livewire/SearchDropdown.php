<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;



class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];
        // Condition of min two characterss to be typed before this function starts
        if (strlen($this->search) > 2) {
            // Function to call API to search movies
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query=' . $this->search)
                ->json()['results'];
        }

        // return the view collecting only the 7th first results
        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
