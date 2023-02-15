<div>

    <h1>Upload Foto Perfil</h1>

    <form action="#" method="POST" wire:submit.prevent="storagePhoto()">
        <input type="file" name="photo" id="photo" wire:model="photo">
        @error('photo')
            {{$message}}
        @enderror
        <br>
        <button type="submit">Upload Foto</button>
    </form>
</div>
