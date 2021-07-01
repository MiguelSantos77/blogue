<!DOCTYPE html>
<html>
<head>
<!-- If you delete this meta tag, the ground will open and swallow you. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Noticias</title>

<link rel="stylesheet" type="text/css" href="{{asset('estilo/email.css')}}" >

</head>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#999999">
	<tr>
		<td></td>
		<td class="header container" align="">

			<!-- /content -->
			<div class="content">
				<table bgcolor="#999999" >
					<tr>

						<td align="left"><h6 style="color: white" class="collapse">Noticias</h6></td>
                        <td align="right" class="collapse"><a class="btn btn-" href="{{route('login')}}" >Entrar</a></td>

					</tr>
				</table>
			</div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table class="body-wrap" bgcolor="">
	<tr>
		<td></td>
		<td class="container" align="" bgcolor="#FFFFFF">

            @foreach ($posts as $post )

            @if ($post->id==$post->max('id'))
            <div class="content">
                <table>
                    <tr>
                        <td>

                            <h1>Ultima Noticia</h1>
                            <h4>{{$post->titulo}} <small>{{$post->intro}}</small></h4>
                            <p class="lead">{{$post->corpo}}</p>

                            <!-- A Real Hero (and a real human being) -->
                            <p><img src="{{ asset('appimages/noticias/' . $post->imagem) }}" /></p><!-- /hero -->
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->
            @endif
            @endforeach

	<!-- content -->

    @foreach ($posts as $post)
        @if ($post->id!=$post->max('id'))

 <!-- content -->
 <div class="content">

    <table bgcolor="">
        <tr>
            <td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="{{ asset('appimages/noticias/' . $post->imagem) }}" /></td>
            <td>
                <h4>{{$post->titulo}} <small>{{$post->intro}}</small></h4>
                <p class="">{{$post->corpo}}</p>
                <a class="btn" href="{{$post->link}}">{{$post->textolink}} &raquo;</a>
            </td>
        </tr>
    </table>

</div><!-- /content -->


        @endif
    @endforeach









		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->


</body>
</html>
