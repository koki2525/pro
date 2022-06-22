@extends('layouts.app')
  
@section('content')
<div style="width: 50%;margin-left: 9rem;" class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User</h2>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There are issues with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form style="width: 50%;margin-left: 10rem;" action="{{ route('users.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" class="form-control" placeholder="Surname">
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <strong>SA ID Number:</strong>
                <input type="text" name="idNumber" maxlength="13" class="form-control" placeholder="ID Number">
            </div>
            <div class="form-group">
                <strong>Mobile Number:</strong>
                <input type="text" name="mobileNumber" maxlength="10" class="form-control" placeholder="Mobile Number">
            </div>
            <div class="form-group">
                <strong>Birth Date:</strong>
                <input type="date" name="birthDate" class="form-control" placeholder="Birth Date">
            </div>
            <div class="form-group">
            <strong>Language:</strong>
                <select class="form-control" name="language" id="language">
                <option value="">Please select</option>
                    <option value="English">English</option>
                    <option value="Sepedi">Sepedi</option>
                    <option value="Xhosa">Xhosa</option>
                    <option value="Zulu">Zulu</option>
                    <option value="Sotho">Sotho</option>
                    <option value="Afrikaans">Afrikaans</option>
                    <option value="Tsonga">Tsonga</option>
                    <option value="Venda">Venda</option>
                </select>
            </div>
            <div class="form-group">
                <strong>Interests:</strong>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Running" name="interests[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Running
                    </label><br>

                    <input class="form-check-input" type="checkbox" value="Chess" name="interests[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Chess
                    </label><br>

                    <input class="form-check-input" type="checkbox" value="Watching Movies" name="interests[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Watching Movies
                    </label><br>

                    <input class="form-check-input" type="checkbox" value="Travelling" name="interests[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Travelling
                    </label><br>
            </div>
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

<script type="text/javascript">
$('.datepicker').datepicker({
  // Escape any “rule” characters with an exclamation mark (!).
  format: 'You selecte!d: dddd, dd mmm, yyyy',
  formatSubmit: 'yyyy/mm/dd',
  hiddenPrefix: 'prefix__',
  hiddenSuffix: '__suffix'
})
</script>

@endsection