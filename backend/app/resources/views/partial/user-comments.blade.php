@forelse($comments as $comment )
    <div>
        <div class="user-comment">
            <img class="avatar-img" src="{{ asset('frontend/assets/images/avatar.png') }}" alt="avatar">
            <h6> 7 روز پیش  {{ $comment->user->name }}  </h6>
        </div>
        <div class="comment-container">
            <p>
                {{ $comment->message }}
            </p>
        </div>
    </div>
@empty
    <div  class="alert alert-danger"> There are no comments for this post </div>
@endforelse



