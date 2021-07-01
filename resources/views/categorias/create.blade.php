@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                      {{ __('Criar Categorias') }}</div>
                <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <form action="{{route('categorias.store')}}" method="POST">
                @csrf
                                <div class="form-group">
                                  <label for="categorianome">Nome da categoria</label>
                                  <input type="text" class="form-control" id="categorianome" name= "categorianome" required>
                                  @error('categorianome')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Gravar</button>
                              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
