<x-app-layout>
    <div class="py-12">
        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif
        <form action="" method="get">
            <div>
                <button type="submit">全て</button><br>
                @foreach($primary_categories as $primary_category)
                    <b>{{ $primary_category->name }}</b>
                    <ul>
                    @foreach($primary_category->secondary_categories as $category)
                        <li><button type="submit" name="category" value="{{ $category->id }}">{{ $category->name }}</button></li>
                    @endforeach
                    </ul>
                @endforeach
            </div>
        </form>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($threads as $thread)
                        <li>
                            {{ $thread->updated_at }}<br>
                            カテゴリー：{{ $thread->secondary_category->name }}<br>
                            <a href="{{ route('thread.show', ['thread' => $thread->id]) }}">{{ $thread->user->name }}</a><br>
                            <b>{{ $thread->title }}</b>
                        </li>
                        <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
