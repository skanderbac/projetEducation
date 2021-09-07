@extends("layouts.front")
@section("title")
    Cours
@endsection
@section("page")
    Ajouter Un support de cours
@endsection
@section("contenu")
    @foreach($teacher as $t)
    @if($t->confirmed ==0)
        <div class="alert alert-warning">

                <li>Votre compte n'est pas encore confirmé par l'admin, vous ne pouvez pas ajouter des support de cours tant que vous n'etes pas confirmé !</li>

        </div>
    @else
        <section id="about">
            <div class="container">
                <div class="row">

                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{session()->get("success")}}
                        </div>
                    @endif

                    <form method="post" action="/support/create" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label>Bac</label>
                            <select class="form-control"  name="bac_id" id="bac_id">
                                @foreach($bac as $b)
                                    <option value="{{$b->id}}">{{$b->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Matiére</label>
                            @foreach($matiere as $m)
                                <h6>{{$m->nom}}</h6>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label >Cours</label>
                            <select class="form-control" id="cours_id"  name="cours_id">
                                <option value="1">Dipôle RC</option>
                            </select>
                        </div>
                        <input type="hidden" name="user_id">
                        <div class="form-group">
                            <label >Charger les Piéces jointes</label>
                            <input id="input-2" name="filenames[]" type="file" class="file"  data-show-upload="false" data-show-caption="true" multiple>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                    <script>
                        $(function () {
                            LoadData()
                            $('#bac_id').change(function(){
                                LoadData()
                            });


                        });

                        function LoadData() {
                            $.ajax({
                                type: "POST",
                                url: "/matierescours",
                                data: { bac_id: $('#bac_id').val() },//session
                                dataType: "json",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (data) {
                                    $('#cours_id').empty();
                                    $.each(data, function (i, item) {
                                        var rows = '<option value="'+item.id+'">'+
                                            item.titre+
                                            '</option>';
                                        $("#cours_id").append(rows);
                                    });

                                }
                            });
                        }


                    </script>

                </div>
            </div>
        </section>
    @endif
    @endforeach
@endsection
