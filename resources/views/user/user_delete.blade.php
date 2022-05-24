<x-app-layout>
    <div class="py-4">
        <x-flash-message />

        <div class="container px-5 py-8 mx-auto flex flex-wrap flex-col">
            <x-user-nav-link type="delete" />
            <section class="text-gray-600 body-font relative">
                <div class="container px-5 mx-auto">
                    <x-error-message />
                    <form action="{{ route('user.destroy') }}" method="post" class="mx-auto px-8 md:px-0" onsubmit="return deleteConfirm()">
                        @csrf
                        <div class="flex flex-col">
                            <div class="p-2 w-2/3 md:w-1/2 mx-auto mb-4">
                                <div class="relative">
                                    <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                                    <input type="password" id="password" name="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <button type="submit" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">アカウント削除</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script>
        function deleteConfirm() {
            return confirm("本当に削除してもよろしいですか。");
        }
    </script>
</x-app-layout>
