<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url("css/style.css")}}">
    <form action="" method="post" wire:submit.prevent="create" >
        <label for="content">Tweet</label>
        <input type="text" wire:model.live="content" id="content" name="content">

        @error('content')
            {{$message}}
        @enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        @if ($tweet->user->getImageAttribute())
            <img class="img-user" src="{{url("storage/{$tweet->user->getImageAttribute()}")}}" alt="{{$tweet->user->name}}" srcset="">
        @else
            <img class="img-user" src="{{url('imgs/no-image.png')}}" alt="{{$tweet->user->name}}" srcset="">
        @endif
        {{$tweet->user->name}} - {{$tweet->content}}        
        @if ($tweet->likes->count())
            <a href="#" wire:click.prevent="unLike({{$tweet->id}})">Descurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{$tweet->id}})">Curtir</a>
        @endif
        
        @if ($tweet->user_id == auth()->user()->id)
            -  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#excluirModal">
            Deletar
            </button>
        
        <!-- Modal -->
        <div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="excluirModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="excluirModalLabel">Confirmar exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir este tweet?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success " data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click.prevent="delete({{$tweet->id}})">Excluir</button>
                </div>
            </div>
            </div>
        </div>
        @endif
        <br>
    @endforeach

    <hr>

    <div>
        {{$tweets->links()}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
</div>
