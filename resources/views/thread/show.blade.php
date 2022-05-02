<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    スレ主：{{ $thread->user->name }}<br>
                    <b>{{ $thread->title}}</b><br><br>
                    {{ $thread->body }}<br>

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
