@extends('layouts.app')
@section('content')

<div class="container" style="width: 100%">
    <h4 class="grey-text text-darken-1 center">Generate Report</h4>
    <div class="card-panel">
        <div class="row mb-0">
            <form action="{{route('reports.make')}}" method="POST">
            @csrf()
                <div class="input-field col s10 offset-s1 m4 l4 xl3 offset-xl1">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" name="date_from" id="date_from" class="datepicker" value="{{old('date_from') ? : ''}}">
                    <label for="date_from">Date From</label>
                    <span class="{{$errors->has('date_from') ? 'helper-text red-text' : ''}}">{{$errors->has('date_from') ? $errors->first('date_from') : ''}}</span>
                </div>
                <div class="input-field col s10 offset-s1 m4 l4 xl3">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" name="date_to" id="date_to" class="datepicker" value="{{old('date_to') ? : ''}}">
                    <label for="date_to">Date To</label>
                    <span class="{{$errors->has('date_to') ? 'helper-text red-text' : ''}}">{{$errors->has('date_to') ? $errors->first('date_to') : ''}}</span>
                </div>
                <br>
                <button type="submit" class="btn col s6 offset-s3 m3 l3 xl3 offset-xl1">create PDF</button>
            </form>
        </div>
    </div>

    <!-- Show All patient List as a Card -->
    <div class="card">
    <div class="card-content">
        <div class="row">
            <h5 class="pl-15 grey-text text-darken-2">Patient List</h5>
            <!-- Table that shows patient List -->
            <table class="responsive-table col s12 m12 l12 xl12">
                <thead class="grey-text text-darken-1">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Symptom</th>
                        <th>Start Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody id="emp-table">
                    <!-- Check if there are any patient to render in view -->
                    @if($patients->count())
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->id}}</td>
                                <td>
                                <img class="emp-img" src="{{asset('storage/patient_images/'.$patient->picture)}}">
                                </td>
                                <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                                <td>{{$patient->patDepartment->dept_name}}</td>
                                <td>{{$patient->patDivision->division_name}}</td>
                                <td>{{$patient->join_date}}</td>
                                <td>
                                <a href="{{route('patients.show',$patient->id)}}" class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">list</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        {{-- if there are no patients then show this message --}}
                        <tr>
                            <td colspan="5"><h6 class="grey-text text-darken-2 center">No patients Found!</h6></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- patients Table END -->
        </div>
        <!-- Show Pagination Links -->
        <div class="center">
            {{$patients->links('vendor.pagination.default',['paginator' => $patients])}}
        </div>
    </div>
</div>
<!-- Card END -->
</div>

@endsection