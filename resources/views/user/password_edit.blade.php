<x-app-layout>
    <div class="py-4">
        <x-flash-message />
        <div>
            <div class="container px-5 py-8 mx-auto flex flex-wrap flex-col">
                <x-user-nav-link type="password" />
                <section class="text-gray-600 body-font relative">
                  <div class="container px-5 mx-auto">
                  <x-error-message />
                    <form action="{{ route('user.password_update') }}" method="post" class="mx-auto px-8 md:px-0" enctype="multipart/form-data">
                      @csrf
                      <div class="flex flex-col">
                        <div class="p-2 w-full md:w-1/2 mx-auto">
                          <div class="relative">
                            <label for="current_password" class="leading-7 text-sm text-gray-600">現在のパスワード</label>
                            <input type="password" id="current_password" name="current_password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="p-2 w-full md:w-1/2 mx-auto">
                          <div class="relative">
                            <label for="new_password" class="leading-7 text-sm text-gray-600">新しいパスワード</label>
                            <input type="password" id="new_password" name="new_password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="p-2 w-full md:w-1/2 mx-auto">
                          <div class="relative">
                            <label for="new_password_confirmation" class="leading-7 text-sm text-gray-600">パスワード確認</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="p-2 w-full">
                          <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
