<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'teste';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('livewire.show-tweets', ['tweets' => $tweets]);
    }

    public function create()
    {
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = '';
    }

    public function like(Tweet $tweet)
    {
        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
