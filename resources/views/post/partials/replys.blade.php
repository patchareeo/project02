@foreach ($comments as $comment)
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
    <div class="display-comment">
        {{-- {{ $comment->user}} --}}
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment" class="form-control" required/>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            

        </form>
        <div class="form-group">

            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" 
            value="ตอบกลับ" />
        </div>

            @if (Auth::user())
            @if (Auth::user()->name === $comment->user->name )
            <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                    <div class="col-md">
                        @csrf
                        @method('DELETE')
                         <button type="submit" class="btn btn-warning"
                            onclick="return confirm('ต้องการลบใช่หรือไม่ ?')">ลบ</button>
                    </div>
                </form> 
                @endif
                @endif
                <br>

            @include('post.partials.replys', ['comments' => $comment->replies])
      
    </div>
@endforeach
