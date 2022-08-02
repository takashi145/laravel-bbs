<x-app-layout>
    <div class="py-4">
        <x-flash-message />
        <div class="mx-auto flex flex-col lg:flex-wrap px-8 md:px-0 mb-8">
            <div class="bg-white py-12 rounded-xl text-center md:w-1/4 md:mt-12 m-3 md:ml-8 lg:ml-16 md:fixed shadow-lg lg:w-1/4">
              <div class="overflow-hidden w-32 h-32 ring-2 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                @if(!is_null(Auth::user()->image) && Storage::exists('public/user/'.Auth::user()->image))
                    <img class="h-full w-full" src="{{ asset('/storage/user/'.Auth::user()->image) }}">
                @else
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                @endif
              </div>
              <div class="flex flex-col items-center text-center justify-center p-3">
                <h2 class="font-medium title-font text-gray-900 text-lg">{{ Auth::user()->name }}</h2>
                <div class="w-12 h-1 bg-indigo-500 rounded mb-4"></div>
                <div>
                    <a href="{{ route('user.edit') }}" class="text-blue-400 hover:text-blue-500">ユーザ情報編集</a>
                </div>
              </div>
            </div>
            <div class="md:w-1/3"></div>
            <div class="w-full md:w-2/3 overflow-hidden sm:rounded-lg mx-auto md:mr-3">
                <div class="p-6">
                    <ul class="mb-8">
                        @if(count($threads) == 0)
                            <div class="text-xl text-center md:mt-16">
                                投稿がありません。
                            </div>
                        @endif
                        @foreach($threads as $thread)
                        <div class="flex items-center mx-auto sm:flex-row my-2 p-4 rounded border-b-2 bg-white shadow-lg">
                            <div class="w-40 h-40 sm:w-32 sm:h-32 mr-2 h-20 w-20 sm:mr-3 inline-flex items-center justify-center border-1 bg-indigo-100 text-indigo-500 flex-shrink-0">
                                @if(!is_null($thread->image) && Storage::exists('public/thread/'.$thread->image))
                                    <img class="h-full w-full" src="{{ asset('/storage/thread/'.$thread->image) }}">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                <details class="text-right mb-3 cursor-pointer">
                                    <div class="text-left bg-gray-100 p-2 m-2 ">
                                        <p class="mb-2 text-sm">
                                            カテゴリ―：
                                            <span class="text-gray-900 text-sm">
                                                {{ $thread->secondary_category->primary_category->name }}
                                                ->
                                                {{ $thread->secondary_category->name }}
                                            </span>
                                        </p>
                                        @php
                                            // 作成日からの現在時刻までの経過時間を計算
                                            $date = new \Carbon\Carbon($thread->created_at);
                                            $now = \Carbon\Carbon::now();
                                            $diffDate = $date->diffForHumans($now);
                                        @endphp
                                        <p class="my-2 text-sm">作成日： {{ $diffDate }}</p>
                                        <p class="text-gray-900 title-font mb-2">
                                            作成者：
                                            @if($thread->user->id == Auth::id())
                                                <span class="font-bold">自分</span>
                                            @else
                                                {{ $thread->user->name }}
                                            @endif
                                        </p>
                                    </div>
                                </details>
                                <p class="leading-relaxed text-base p-2 bg-gray-100 rounded">{{ $thread->title }}</p>
                                <div class="mt-4 text-right">
                                    <div class="flex flex-row">
                                      <a href="{{ route('thread.edit', ['thread' => $thread]) }}" class="text-blue-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                      </a>
                                      <form action="{{ route('thread.destroy', ['thread' => $thread]) }}" method="post" onsubmit="return deleteConfirm()">
                                        @csrf
                                        @method("delete")
                                        <button type="submit">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                        </button>
                                      </form>
                                        
                                    </div>
                                    <a href="{{ route('thread.show', ['thread' => $thread]) }}" class="inline-block text-blue-500 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </ul>
                    {{ $threads->links() }}
                </div>
            </div>
        </div>
        <x-thread-create-btn />
    </div>
    <script>
        function deleteConfirm() {
            return confirm("本当に削除してもよろしいですか。");
        }
    </script>
</x-app-layout>
