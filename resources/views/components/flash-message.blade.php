@if(session('message'))
  <div class="text-white bg-green-400 w-2/3 p-2 mx-auto text-center rounded">
    <p>{{ session('message') }}</p>
  </div>
@endif
