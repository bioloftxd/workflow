<form action="{{route('categorias.store')}}" method="POST">
    {{csrf_field()}}
    <input type="text" name="nome" placeholder="NOme">
    <input type="submit">
</form>