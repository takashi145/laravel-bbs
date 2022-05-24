<div class="flex mx-auto flex-wrap mb-12">
    <a href="{{ route('user.edit') }}" class="@if($type == 'basic') text-indigo-500 border-indigo-500 @endif sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium bg-gray-100 inline-flex items-center leading-none tracking-wider rounded-t">
        基本情報
    </a>
    <a href="{{ route('user.edit', ['type' => 'password']) }}" class="@if($type == 'password') text-indigo-500 border-indigo-500 @endif sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
        パスワード変更
    </a>
    <a href="{{ route('user.edit', ['type' => 'destroy']) }}" class="@if($type == 'delete') text-indigo-500 border-indigo-500 @endif sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
        アカウント削除
    </a>
</div>