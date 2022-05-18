<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
              <section class="text-gray-600 body-font">
                  <div class="container px-5 mx-auto">
                  @if($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  @endif
                  <form action="{{ route('thread.store') }}" method="post" class="text-center">
                    @csrf
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <div class="flex flex-col -m-2">
                        <div class="p-2 w-full text-left">
                          <div class="mb-2">
                            <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                            <select name="secondary_category_id" class="rounded py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                              <option value="">カテゴリ―を選択</option>
                              @foreach($primary_categories as $primary_category)
                                <optgroup label="{{ $primary_category->name }}">
                                @foreach($primary_category->secondary_categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </optgroup>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="p-2 w-full mx-auto mb-3">
                          <div class="relative">
                            <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                            <input type="text" id="title" name="title" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="body" class="leading-7 text-sm text-gray-600">説明</label>
                            <textarea id="body" name="body" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                          </div>
                        </div>
                        <div>
                          <button type="submit" class="text-white bg-blue-400 hover:bg-blue-500 py-2 px-4 rounded">作成</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
