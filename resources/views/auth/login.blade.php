@extends('index')
{{-- @push('styles')
@endpush --}}
@section('content')

    <div class="container">
        <div class="row m-b-2">
            <div class="col-md-7 col-md-offset-3">
                <br><br>
                <h4 class="activities-sidbar">Iniciar Sesión</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-3">
            @if(session('status'))
                {{ session('status') }}
            @endif
                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 form-group item-form">
                            <label for="usuario">Nombre</label>
                            <input type="text" name="name" id="name" placeholder="Ingrese Nombre" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <div class="" style="margin-top:10px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 form-group item-form">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Ingrese contraseña" class="form-control" value="{{old('password')}}">

                            @error('password')
                                <div class="" style="margin-top:10px">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 text-right">
                            <button class="btn btn-success" type="submit">INGRESAR</button>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-10">
                            <hr>
                        </div>
                    </div> --}}

                </form>

                {{-- <div class="row">
                    <div class="col-xs-12">
                        <p><a href="#">Recuperar mi contraseña</a></p>
                    </div>
                </div> --}}
            </div>


        </div>



    </div>

@endsection
