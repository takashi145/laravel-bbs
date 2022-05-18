<x-app-layout>
    <div class="py-12">
        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg mx-auto md:w-2/3">
                <div class="p-6">
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto bg-white p-4 rounded">
                            <div class="md:w-2/3 mx-auto">
                                <p>作成日：{{ $thread->created_at }}</p>
                                <p>投稿者：{{ $thread->user->name }}</p>
                                <h2 class="text-lg font-bold mt-3">
                                    カテゴリー：{{ $thread->secondary_category->name }}
                                </h2>
                            </div>
                            <div class="mx-auto flex justify-center rounded-lg md:w-2/3 md:h-2/3 mb-3">
                                <img class="h-full w-full" src="https://dummyimage.com/1200x500">
                            </div>
                            <div class="md:w-2/3 mx-auto">
                                <h1 class="title-font sm:text-4xl text-3xl mb-2 font-medium text-gray-900">{{ $thread->title }}</h1>
                                <p class="mb-2 leading-relaxed">{{ $thread->body }}</p>
                            </div>
                            @if(Auth::id() == $thread->user->id)
                            <div class="flex justify-center">
                                <button onclick="location.href='{{ route('thread.edit', ['thread' => $thread->id]) }}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                                <form action="{{ route('thread.delete', ['thread' => $thread->id]) }}" method="post" onsubmit="return deleteConfirm()">
                                    @csrf
                                    @method('delete')
                                    <button class="ml-4 inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg" type="submit">削除</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </section>
                </div>
                <div class="px-2 border-b border-gray-200">
                  @if($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  @endif
                  <form action="{{ route('comment.store', ['thread' => $thread->id])}}" method="post" class="mb-8 px-4">
                    @csrf
                    <div class="relative">
                        <label for="comment" class="leading-7 text-gray-600">コメント</label>
                        <textarea id="comment" name="comment" class="w-full bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="text-white bg-blue-400 hover:bg-blue-500 px-8 py-2 rounded">投稿</button>
                    </div>
                  </form>
                  <div class="mb-10">
                    @foreach($comments as $index => $comment)
                        <div class="flex-grow bg-white rounded p-2 m-3 border">
                            <span class="mx-3 text-gray-900 text-lg title-font font-medium mb-3">
                                {{$index+1}}. {{ $comment->user->name }}
                            </span>
                            {{ $comment->created_at }}に投稿
                            <div class="leading-relaxed text-base p-3 bg-gray-100">
                                {!! nl2br(e($comment->comment)) !!}
                                <!-- <div class="p-4 flex justify-center">
                                    <img class="md:h-2/3 md:w-2/3" src="https://dummyimage.com/1200x500">
                                </div> -->
                            </div>
                            @if(Auth::id() == $comment->user->id)
                            <form action="{{ route('comment.delete', ['comment' => $comment]) }}" method="post" onsubmit="return deleteConfirm()" class="text-right p-2">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-400">削除</button>
                            </form>
                            @endif
                        </div>
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
