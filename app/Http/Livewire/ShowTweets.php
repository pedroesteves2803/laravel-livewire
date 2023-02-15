<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{

    public $message = 'teste';

    public function render()
    {
        $tweets = Tweet::witch('user')->get();

        return view('livewire.show-tweets', ['tweets' => $tweets]);
    }
}
