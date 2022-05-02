<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  @endif
                  <form action="{{ route('thread.update', ['thread' => $thread->id]) }}" method="post" class="text-center">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label for="title">タイトル</label>
                      <input type="text" id="title" name="title" value="{{ $thread->title }}">
                    </div>
                    <div>
                      <label for="body">スレッド説明</label>
                      <textarea name="body" id="body" cols="30" rows="10">{!! nl2br(e($thread->body)) !!}</textarea>
                    </div>
                    <div>
                      <button type="submit" class="text-white bg-blue-400 hover:bg-blue-500 px-4 py-2 rounded">更新</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
