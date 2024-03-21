
<div>
    tweets

    {{-- <p>
        {{$content}}
    </p> --}}
    
    {{-- <label for="live-content">live-content</label>
    <input type="text" wire:model.live="content" id="live-content">  --}}

    <form action="" method="post" wire:submit.prevent="create" >
        <label for="content">tweet</label>
        <input type="text" wire:model.live="content" id="content" name="content">

        @error('content')
            {{$message}}
        @enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}}        
        @if ($tweet->likes->count())
            <a href="">Descurtir</a>
        @else
            <a href="">Curtir</a>
        @endif
        <br>
    @endforeach

    <hr>

    <div>
        {{$tweets->links()}}
    </div>
    
</div>