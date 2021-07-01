@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Lista de publicaçoes</h3>
            @forelse ($posts as $post)
                <div class="card mb-3" >
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($post->imagem == null)
                                <img src="{{asset('appimages/semimagem.png')}}" alt="{{$post->intro}}" class="img-fluid">
                            @else
                                <img src="{{asset('appimages/noticias/'.$post->imagem)}}" alt="{{$post->intro}}" class="img-fluid">
                            @endif
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->titulo}}</h5>
                                <p class="card-text"><span class="badge bg-secondary">{{$post->categoria->categorianome}}</span></p>
                                <p class="card-text">{{$post->intro}}</p>
                                <a href="{{$post->link}}" class="btn btn-primary" target="blank" >{{$post->textolink}}</a>
                                <a href="{{route('noticias.show',$post->id)}}" class="btn btn-primary">Ver mais</a>
                                <p class="card-text text right"><small class="text-muted">Criado por {{$post->user->name}}  {{$post->created_at->diffForHumans()}} <br>Ultima alteracao {{$post->updated_at->diffForHumans()}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p>Ainda sem publicaçoes</p>
            @endforelse
        
        </div>
        </div>
    </div>
</div>

@endsection