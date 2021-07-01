@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                      {{ __('Ver Notícia') }}</div>
                <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                    <div class="card">
                        @if ($post->imagem==null)
                            <img src="{{asset('appimages/semimagem.png'.$post->imagem)}}" class="card-img-top" alt={{$post->intro}}>
                        @else
                            <img src="{{asset('appimages/noticias/'.$post->imagem)}}" class="card-img-top" alt={{$post->intro}}>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{$post->titulo}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$post->intro}}}</h6>
                            <p class="card-text">{{$post->corpo}}</p>
                            <a href="{{$post->link}}" class="btn btn-primary" target="blank" >{{$post->textolink}}</a>
                            <p class="card-text"><small class="text-muted">Criado por {{$post->user->name}}  {{$post->created_at->diffForHumans()}} <br>Ultima alteracao {{$post->updated_at->diffForHumans()}}</small></p>
                        </div>

                        <div class="card-footer" >
                            <a href="{{route('noticias.index')}}" class="btn btn-primary">Voltar á lista</a>
                            @if ($post->user_id==Auth::user()->id)
                                <div style="width: 100px; float:left; height:40px;  margin:1px">
                                    <form action="{{route('noticias.destroy',$post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Apagar</button>
                                    </form>
                                </div>
                                <div style="width: 100px; float:left; height:40px;  margin:1px">
                                    <a href="{{route('noticias.edit',$post->id)}}" class="btn btn-warning"> Editar</a>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
