<div>
    <h1>
        Upload de foto de perfil
    </h1>
    @error('photo')
        {{$message}}
    @enderror
    <form action="" method="post" wire:submit.prevent="storagePhoto">

        <input type="file" wire:model="photo">
        <button type="submit">Upload Foto</button>
    </form>
</div>
