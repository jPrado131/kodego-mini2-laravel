<div>
<h3>Comments</h3>
<div class="card">
    <div class="card-body">

        @if(isset($comment_data))
            @foreach($comment_data as $item)

                <div class="d-flex flex-start align-items-center">
                    @if($item->thumbnail)
                        <img src="{{$item->thumbnail}}" alt="User Profile" class="rounded-circle shadow-1-strong me-3" style="margin-right: 10px; width: 50px;height: 50px;">
                    @else
                        <img src="https://via.placeholder.com/40" alt="User Profile" class="rounded-circle shadow-1-strong me-3" style="margin-right: 10px; width: 50px;height: 50px;">
                    @endif
            
                    <div>
                    <h6 class="fw-bold text-primary mb-1">{{$item->name}}</h6>
                    <p class="text-muted small mb-0">
                        {{ date('D, jS M Y H:i', strtotime($item->comment_date)) }}

                    </p>
                    </div>
                </div>
                <p class="mt-3 mb-4 pb-2">
                    {{ $item->comment }}
                </p>
                <hr>
            @endforeach
        @endif

    </div>
    <form wire:submit="save" id="commentPost">
        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
        
                @if($user->thumbnail)
                    <img src="{{$item->thumbnail}}" alt="User Profile" class="rounded-circle shadow-1-strong me-3" style="margin-right: 10px; width: 50px;height: 50px;">
                @else
                    <img src="https://via.placeholder.com/40" alt="User Profile" class="rounded-circle shadow-1-strong me-3" style="margin-right: 10px; width: 50px;height: 50px;">
                @endif

            <div class="form-outline w-100">
            <textarea class="form-control" id="textAreaExample" rows="4"
                style="background: #fff;" wire:model="comment" placeholder="Messages"></textarea>
            </div>
        </div>
        <div class="float-end mt-2 pt-1">
            <button type="submit" class="btn btn-primary btn-sm">
                Post comment
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                </svg>
            </button>
        </div>
        </div>
    </form>
  </div>
</div>
