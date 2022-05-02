<x-app-layout>
    <div class="py-12">
        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    スレ主：{{ $thread->user->name }}<br>
                    <b>{{ $thread->title}}</b><br><br>
                    {!! nl2br(e($thread->body)) !!}<br>

                    @if($thread->user->id === Auth::id())
                    <div>
                      <button onclick="location.href='{{ route('thread.edit', ['thread' => $thread->id]) }}'">編集</button>
                      <form action="{{ route('thread.delete', ['thread' => $thread->id]) }}" method="post" onsubmit="return deleteConfirm()">
                          @csrf
                          @method('delete')
                          <button type="submit">削除</button>
                      </form>
                    </div>
                    @endif
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                  @if($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  @endif
                  <form action="{{ route('comment.store', ['thread' => $thread->id])}}" method="post">
                      @csrf
                      <div>
                          <label for="comment">コメント</label>
                          <textarea name="comment" id="comment" cols="30" rows="10">{{ old('comment') }}</textarea>
                      </div>
                      <div>
                          <button type="submit">投稿</button>
                      </div>
                  </form>
                  <br><br>
                  <hr>
                  <div>
                      <h2>コメント一覧</h2>
                      @foreach($comments as $comment)
                        <p>
                            ユーザー：{{ $comment->user->name }}<br>
                            {!! nl2br(e($comment->comment)) !!}<br>
                            @if(Auth::id() == $comment->user->id)
                            <form action="{{ route('comment.delete', ['comment' => $comment]) }}" method="post" onsubmit="return deleteConfirm()">
                                @csrf
                                @method('delete')
                                <button type="submit">削除</button>
                            </form>
                            @endif
                        </p>
                        <hr>
                      @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteConfirm() {
            return confirm("本当に削除してもよろしいですか。");
        }
    </script>
</x-app-layout>
