<div x-data="{open: true}" x-show="open" @click="open = false" class="my-3">
  @if(session('message'))
    <div class="text-white bg-green-400 w-2/3 p-2 mx-auto text-center rounded">
      <p>{{ session('message') }}</p>
    </div>
  @elseif(session('alert'))
    <div class="text-white bg-red-400 w-2/3 p-2 mx-auto text-center rounded">
      <p>{{ session('alert') }}</p>
    </div>
  @endif
</div>


