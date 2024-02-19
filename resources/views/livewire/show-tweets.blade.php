<div>
    tweets

    <p>
        {{$message}}
    </p>
    
    <label for="live-message">live-message</label>
    <input type="text" wire:model.live="message" id="live-message"> 

    <hr>

    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}} <br>
    @endforeach
</div>