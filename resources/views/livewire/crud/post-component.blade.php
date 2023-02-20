<div>
   <div class="container col-6 col-md-4 mt-5">
   @if (session()->has('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
    <h1>Posts</h1>
    <a href="{{ route('create-post') }}" class="btn btn-primary">Create Post</a>
    </div>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
    <div class="row rounded shadow-sm border mb-2 p-3" style="background-color: #f8fafc;" id="post">
        <div class="d-flex mb-2">
        <div class="w-75 d-flex m-0">
            <p class="mb-0 fs-6">
               <strong> &#64;{{ $post->nickname }} </strong> says:
            </p>
        </div>
        <div class="d-flex align-items-center border-bottom">
            <span @class([
                    'badge rounded-pill text-bg-primary mb-1' => $post['category'] === 'Books',
                    'badge rounded-pill text-bg-danger mb-1' => $post['category'] === 'Electronics',
                    'badge rounded-pill text-bg-info mb-1' => $post['category'] === 'Programming',
                    'badge rounded-pill text-bg-success mb-1' => $post['category'] === 'Health',
                ])
                >
                {{ $post->category }}
            </span>
            
            <p href="#" class="text-dark mb-1" style="margin-left: 10px;"> {{ date_format($post->created_at, "Y/m/d") }}</p>
        </div>
        
        </div>
        <div class="container">
            <p class="mb-0">{{ $post->content }}</p>
        </div>
        <div class="container d-flex justify-content-end">
        <a href="{{ route('edit-post', ['id'=>$post->id]) }}" class="text-dark text-decoration-none float-end mt-2" id="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        <a href="javascript:void(0)" wire:click="deletePost({{ $post->id }})" class="text-danger text-decoration-none float-end mt-2" style="margin-left: 10px;">
        <i class="fa-solid fa-trash"></i> Delete</a>
        </div>
    </div>
        @endforeach
    @else
    <div class="row text-center">
        <p class="mb-0 fw-semibold disabled">No post yet.</p>
    </div>
    @endif
   </div>

   <!-- Modal -->
<div class="modal fade" id="deleteConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button wire:click="deletePost" type="button" class="btn btn-primary" >Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>



<style>
    .rounded {
        border-radius: 20px !important;
    }

    #post:hover {
        background-color: #f1f5f9 !important;
    }
    #edit:hover {
        color: #6b7280 !important;
    }
</style>