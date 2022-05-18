<x-app-layout>
    <div class="py-4">
        @if(session('message'))
            <div class="text-white bg-green-400 w-2/3 p-2 mx-auto text-center rounded">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        
        <div class="max-w-7xl mx-auto md:flex md:flex-row px-8 md:px-0">
            <div class="hidden md:block mx-6 my-14 w-1/4 md:w-1/5 bg-white overflow-hidden shadow-sm sm:rounded-lg overflow-y-auto">
                <h2 class="text-xl border-b-2 mx-3 mt-3 text-center">カテゴリ―</h2>
                <div class="p-4 bg-white text-center overflow-y-auto">
                    <form action="" method="get">
                        <div>
                            <div class="bg-gray-100 p-2 rounded mb-2">
                                @if(!isset($_GET['category']))
                                <div class="text-sm text-blue-600 font-bold">
                                    全て
                                </div>
                                @else
                                <button type="submit" 
                                    class="text-sm text-gray-600 hover:text-gray-800 hover:border-b hover:font-bold">
                                    全て
                                </button>
                                @endif
                            </div>
                            
                            @foreach($primary_categories as $primary_category)
                                <b class="text-lg">{{ $primary_category->name }}</b>
                                <ul class="bg-gray-100 p-2 rounded overflow-x-auto mb-2">
                                @foreach($primary_category->secondary_categories as $category)
                                    <li class="mx-2 my-1">
                                        @if(isset($_GET['category']) && $_GET['category'] == $category->id)
                                            <div class="text-sm text-blue-600 font-bold">
                                                {{ $category->name }}
                                            </div>
                                        @else
                                            <button type="submit" name="category" value="{{ $category->id }}"
                                                class="text-sm text-gray-600  hover:text-gray-800 hover:border-b hover:font-bold">
                                                {{ $category->name }}
                                            </button>
                                        @endif
                                    </li>
                                @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full md:w-2/3 overflow-hidden shadow-sm sm:rounded-lg mx-auto md:mx-2">
                <div class="p-6">
                    <div class="text-center">
                        <p class="text-xl">
                            記事一覧：
                            <span class="font-bold">
                            @if(!isset($_GET['category']))
                                全て
                            @else
                                {{ $category_name }}
                            @endif
                            </span>
                        </p>
                    </div>
                    <ul>
                        @foreach($threads as $thread)
                        <div class="flex items-center mx-auto sm:flex-row flex-col my-2 p-4 rounded border-b-2 bg-white">
                            <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-3 inline-flex items-center justify-center border-1 bg-indigo-100 text-indigo-500 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
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
                    @if(isset($_GET['category']))
                        {{ $threads->appends($_GET['category'])->links() }}
                    @else
                        {{ $threads->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
