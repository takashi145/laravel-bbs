props
<div class="hidden md:block mx-6 my-6 w-1/4 md:w-1/5 bg-white overflow-hidden shadow-sm sm:rounded-lg h-96 overflow-y-auto">
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