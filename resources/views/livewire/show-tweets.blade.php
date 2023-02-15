<div>
    Show tweets

   <p>{{ $content }}</p>

   <form method="POST" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        @error('content') {{ $message }} @enderror
        <button type="submit">Tweetar</button>
   </form>

   <hr>

   @foreach ($tweets as $tweet)
    <div class="flex">
        <div class="w-2/8">
            @if ($tweet->user->photo)
                <img src="{{asset("storage/{$tweet->user->photo}")}}" alt="{{$tweet->user->name}}" class="rounded-full h-8 w-8">
            @else
                <img src="{{asset('imgs/no-image.png')}}" alt="no-photo" class="rounded-full" class="rounded-full h-8 w-8">
            @endif

            {{$tweet->user->name}}
        </div>

        <div class="w-6/8">
            {{$tweet->content}}

            @if($tweet->likes()->count())
                <a href="#" wire:click.prevent="unlike({{$tweet->id}})">Descurtir</a>
            @else
                <a href="#" wire:click.prevent="like({{$tweet->id}})">Curtir</a>
            @endif
        </div>
    </div>
   @endforeach

   <hr>

   <div>
    {{ $tweets->links() }}
   </div>
</div>
