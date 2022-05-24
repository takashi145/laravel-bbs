@if($errors->any())
  <ul class="text-red-500 mb-3">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif