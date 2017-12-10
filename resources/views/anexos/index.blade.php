@foreach($anexos as $a)
    {{--    <a href="{{action("AnexosController@download",["arquivo"=>$a->caminho])}}">{{$a->caminho}}</a>--}}

    <a href="{{route("download",["path"=>str_replace("modelos/","", $a->caminho), "nome"=>"asd"])}}">{{str_replace("modelos/","", $a->caminho)}}</a>
    <br>
@endforeach