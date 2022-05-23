<x-app-layout>
    <div class="py-4">
        <x-flash-message />
        
        <div class="mx-auto md:flex md:flex-row px-8 md:px-0">
            
            <x-category-component :primary_categories="$primary_categories" />

            <div class="w-full md:w-2/3 overflow-hidden shadow-sm sm:rounded-lg mx-auto md:mx-2">
                <div class="">
                    <ul class="mb-8">
                        @foreach($threads as $thread)
                        <div class="flex items-center mx-auto sm:flex-row my-2 p-4 rounded border-b-2 bg-white">
                            <div class="w-40 h-40 sm:w-32 sm:h-32 mr-2 h-20 w-20 sm:mr-3 inline-flex items-center justify-center border-1 bg-indigo-100 text-indigo-500 flex-shrink-0">
                                @if(!is_null($thread->image) && Storage::exists('public/thread/'.$thread->image))
                                    <img class="h-full w-full" src="{{ asset('/storage/thread/'.$thread->image) }}">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-grow sm:text-left mt-6 sm:mt-0">
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
                        {{ $threads->appends(['category' => $_GET['category']])->links() }}
                    @else
                        {{ $threads->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
