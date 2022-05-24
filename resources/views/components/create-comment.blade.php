<div>
    <x-dropdown-comment>
        <x-slot name="trigger">
            <button class="bg-blue-500 hover:bg-blue-600 rounded-full p-4 font-medium text-white transition duration-150 ease-in-out">
                <div class="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <div>
                <form action="{{ route('comment.store', ['thread' => $thread->id])}}" method="post" class="mb-8 px-4" enctype="multipart/form-data">
                    @csrf
                    <div class="relative">
                        <label for="comment" class="leading-7 text-gray-600">コメント</label>
                        <textarea id="comment" name="comment" class="w-full bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <div class="relative mb-3">
                        <label for="image_file" class="leading-7 text-gray-600">画像</label>
                        <input type="file" id="image_file" name="image_file" class="w-full bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="text-white bg-blue-400 hover:bg-blue-500 px-8 py-2 rounded">投稿</button>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-dropdown-comment>
</div>