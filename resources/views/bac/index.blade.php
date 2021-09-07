@extends("layouts.master")
@section("title")
    Bac
@endsection
@section("page")
    Bac
@endsection
@section("contenu")
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <table class="table">
                    <tbody>
                    @foreach($bac as $b)
                        <tr>
                            <td>Bac {{$b->nom}}</td>
                            <td><a href="/admin/bac/{{$b->id}}">Voir les matieres</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div>


@endsection
