<x-app-layout>
    <div class="py-4">
        <x-flash-message />
        <div>
          <div class="container px-5 py-8 mx-auto flex flex-wrap flex-col">
            <x-user-nav-link type="basic" />
            <section class="text-gray-600 body-font relative">
              <div class="container px-5 mx-auto">
                <x-error-message />
                <form action="{{ route('user.update') }}" method="post" class="mx-auto px-8 md:px-0" enctype="multipart/form-data">
                  @csrf
                  <div class="flex flex-col">
                  <div class="p-2 w-full md:w-1/2 mx-auto">
                    <div>
                      @if(!is_null($user->image) && Storage::exists('public/user/'.$user->image))
                        <img class="w-20 h-20 rounded-full" src="{{ asset('/storage/user/'.$user->image) }}">
                      @endif
                    </div>
                    
                    <label for="image_file" class="leading-7 text-sm text-gray-600">プロフィール画像</label>
                    <input type="file" name="image_file" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                    <div class="p-2 w-full md:w-1/2 mx-auto">
                      <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">ユーザー名</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>
                    <div class="p-2 w-full md:w-1/2 mx-auto mb-8">
                      <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
</x-app-layout>
