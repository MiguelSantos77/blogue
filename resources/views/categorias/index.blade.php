@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                      {{ __('Lista de Categorias') }}</div>
                <a href="{{ route ('categorias.create')}}" class="btn btn-sm btn-success">Criar nova</a>
                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                        @endif
                <ul class="list-group">
                @forelse ($categorias as $categoria)



                <ul class="list-group">
                    <li class="list-group-item"><strong> {{$categoria->categorianome}}</strong>



                            <div style="width: 100px; float:right; height:40px;  margin:1px">
                                <form action="{{route('categorias.destroy',$categoria->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                            </div>
                            <div style="width: 100px; float:right; height:40px;  margin:1px">
                                <a href="{{route('categorias.edit',$categoria->id)}}" class="btn btn-warning"> Editar</a>
                                </div>
                    </li>




                @empty
                <li class="list item">
                    Ainda sem categorias
                </li>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
