<ul>
    @foreach($childs as $child)
    <li>
        {{ $child->nom_categorie }} {{-- <button class="btn btn-danger fa fa-edit"></button> --}}  <form action="/categories/{{$categorie->id }}" method="POST"
            class="d-inline">
            @csrf
            <button type="submit"
                onclick="return confirm('Voulez vous supprimer le categorie ?')"
                class="btn btn-danger btn-sm" title="Delete">
                <span class="fa fa-trash"></span></button>
            @method('DELETE')
        </form>
        @if(count($child->childs))
        @include('categories.manageChild',['childs' => $child->childs])
        @endif
    </li>
    @endforeach
</ul>
