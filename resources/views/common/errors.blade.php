<!-- resources/views/common/errors.blade.php -->
@if (count($errors) > 0)
  <div>
    <p>Whoops! Something went wrong!</p>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
