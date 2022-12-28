

<form class="" action="{{ route('post_comment') }}" method="post">{{ csrf_field() }}
    
    <div class="input-group mb-3">
        <img style="height: 50px; width: 50px;" src="{{ asset(Auth::user()->profile_photo_path) }}" alt="author">
        <input class="form-control" type="text" name="comment" id="comment" placeholder="Write a comment...">
        <span class="input-group-text "  type="submite">Post as {{ Auth::user()->name }}</span>
        <!-- <a href="" class="input-group-text" id="" type="submite">Post as {{ Auth::user()->name }}</a> -->
        @error('comment')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</form>

<form action="" method="post">
    @if($comments->count() > 0)
        @foreach($comments as $comment)
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-start">
                        <img style="height: 50px; width: 50px;" src="//a.disquscdn.com/1658355423/images/noavatar92.png" alt="author">
                        <div class="w-100 px-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- <p class="mb-0" >Ruhul Amin</p> -->
                                <strong>ruhul</strong>
                                <p class="mb-0">{{ $comment->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center ">
                                <!-- <input class="form-control form-control-sm" type="text" name="comment" id="comment" placeholder="Write a comment..."> -->
                                <p class="mb-0">{{ $comment->comment}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="small mb-0" style="color: #aaa;">
                                    <a href="#!" class="link-grey">Remove</a> •
                                    <a href="#!" class="link-grey">Reply</a> •
                                    <a href="#!" class="link-grey">Edit</a>
                                </p>
                                <div class="d-flex flex-row">
                                    <i class="seoicon-social-facebook px-3"></i>
                                    <i class="seoicon-social-twitter px-3"></i>
                                    <i class="seoicon-social-linkedin px-3"></i>
                                    <i class="seoicon-social-google-plus px-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
</form>


<!-- <form action="" method="post">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-start">
                <img style="height: 50px; width: 50px;" src="//a.disquscdn.com/1658355423/images/noavatar92.png" alt="author">
                <div class="w-100 px-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0" >Ruhul Amin</p>
                        <p class="mb-0">2 days ago</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center ">
                        <input class="form-control" type="text" name="comment" id="comment" placeholder="Write a comment...">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="small mb-0" style="color: #aaa;">
                            <a href="#!" class="link-grey">Remove</a> •
                            <a href="#!" class="link-grey">Reply</a> •
                            <a href="#!" class="link-grey">Edit</a>
                        </p>
                        <div class="d-flex flex-row">
                            <i class="fas fa-star text-warning me-2"></i>
                            <i class="far fa-check-circle" style="color: #aaa;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> -->

