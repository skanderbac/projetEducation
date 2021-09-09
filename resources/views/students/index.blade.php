@extends("layouts.master")
@section("title")
    Elèves
@endsection
@section("page")
    Elèves
@endsection
@section("contenu")
    <p>Listes des élèves</p>
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Bac</th>
            <th>Email</th>
            <th>Bac</th>
        </tr>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$student->user->name}}</td>
                <td>{{$student->bac->nom}}</td>
                <td>{{$student->user->email}}</td>
                <td>{{$student->bac->nom}}</td>
                @if($student->blocked==0)
                <td><a href="javascript:void(0)" class="btn btn-danger" onclick="if(confirm('Voulez vous bloquer cet élève ?')){document.getElementById('form-{{$student->id}}').submit()}">Bloquer</a></td>
                    <form id="form-{{$student->id}}" method="post" action="{{route('students.bloque')}}">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$student->id}}">
                    </form>
                @else
                    <td><a href="javascript:void(0)" class="btn btn-info" onclick="if(confirm('Voulez vous débloquer cet élève ?')){document.getElementById('form-{{$student->id}}').submit()}">Débloquer</a></td>
                    <form id="form-{{$student->id}}" method="post" action="{{route('students.debloque')}}">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$student->id}}">
                    </form>
                @endif
            </tr>
            @endforeach
        </tbody>
        {{$students->links()}}
    </table>
@endsection
