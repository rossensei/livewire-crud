<div>
    

    <div class="container col-6 col-md-4 mt-5">
    <h1>Create post</h1>
    <div class="row mb-5">
        <div class="p-4 border rounded shadow" style="background-color: #f9fafb;">
        @if (session()->has('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif
            <form wire:submit.prevent="create">
            <div class="form-floating mb-2">
                <textarea wire:model="content" class="form-control" style="height: 100px"></textarea>
                <label for="floatingTextarea2">What's on your mind?</label>
                @error('content')
                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-floating mb-2">
                    <select wire:model="category" class="form-select">
                        <option value="" disabled>Select Category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Health">Health</option>
                        <option value="Programming">Programming</option>
                        <option value="Books">Books</option>
                    </select>
                    <label for="floatingSelect">Category</label>

                    @error('category')
                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input wire:model="nickname" class="form-control">
                    <label for="floatingInput">Nickname</label>
                    @error('nickname')
                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
                <a href="{{ route('posts') }}" class="btn btn-primary">View Posts</a>
            </form>
            </div>

        </div>
    </div>
</div>
