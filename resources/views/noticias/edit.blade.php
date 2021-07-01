@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                      {{ __('Alterar Noticia') }}</div>
                <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name= "titulo" value= "{{$post->titulo}}" required>
                            @error('titulo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="intro">Introduçao</label>
                            <textarea class="form-control" id="intro" name= "intro" rows="2" required>
                                {{$post->intro}}
                            </textarea>
                            @error('intro')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="corpo">Desenvolvimento</label>
                            <textarea class="form-control" id="corpo" name= "corpo" rows="5" required>
                                {{$post->corpo}}
                            </textarea>
                            @error('corpo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="textolink">Texto do Link</label>
                            <input type="text" class="form-control" id="textolink" name= "textolink" value= "{{$post->textolink}}" >
                            @error('textolink')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name= "link" value= "{{$post->link}}" >
                            @error('link')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categoria"> Categoria</label>
                            <select class="form-control" name="categoria" id="categoria">
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}} " 
                                    @if ($categoria->id == $post->categoria_id))
                                        selected
                                    @endif
                                    > {{$categoria->categorianome}} </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                @if ($post->imagem==null)
                                    <img src="{{asset('appimages/semimagem.png'.$post->imagem)}}" class="card-img-top" alt={{$post->intro}}>
                                @else
                                    <img src="{{asset('appimages/noticias/'.$post->imagem)}}" class="card-img-top" alt={{$post->intro}}>
                                @endif
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="imagem">Imagem</label>
                                    <input type="file" name="imagem" id="imagem" class="form-control" >         
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Gravar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
