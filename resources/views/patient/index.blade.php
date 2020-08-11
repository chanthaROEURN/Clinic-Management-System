@extends('layouts.app')
@section('content')
<div class="container" style="width: 100%">
    <h4 class="grey-text text-darken-1 center">Manage Patient</h4>
    {{-- Search --}}
    <div class="row mb-0">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">search</i>
                    Search Patient
                </div>
                <div class="collapsible-body">
                    <div class="row mb-0">
                        <form action="{{route('patients.search')}}" method="POST">
                            @csrf()
                            <div class="input-field col s12 m6 l5 xl6">
                                <input id="search" type="text" name="search" >
                                <label for="search">Search Patient</label>
                                <span class="{{$errors->has('search') ? 'helper-text red-text' : '' }}">{{$errors->has('search') ? $errors->first('search') : '' }}</span>
                            </div>
                            <div class="input-field col s12 m6 l4 xl4">
                                <select name="options" id="options">
                                    <option value="first_name">First Name</option>
                                    <option value="last_name">Last Name</option>
                                    <option value="email">Email</option>
                                    <option value="address">Address</option>
                                </select>
                                <label for="options">Search by:</label>
                            </div>
                            <br>
                            <div class="col l2">
                                <button type="submit" class="btn waves-effect waves-light">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    {{-- Search END --}}
        <!-- Show All patient List as a Card -->
    <div class="card">
        <div class="card-content">
            <div class="row">
                <h5 class="pl-15 grey-text text-darken-2">Patient List</h5>
                  <a href="{{route('patients.create')}}">
                <button class="btn waves-effect waves-light right">Insert Patient</button></a>
                <!-- Table that shows patient List -->
                <table class="responsive-table col s12 m12 l12 xl12">
                    <thead class="grey-text text-darken-1">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Room</th>
                            <th>Symptoms</th>
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
                            @if(isset($search))
                                <tr>
                                    <td colspan="4">
                                        <a href="/patients" class="right">Show All</a>
                                    </td>
                                </tr>
                            @endif
                        @else
                            {{-- if there are no patients then show this message --}}
                            <tr>
                                <td colspan="5"><h6 class="grey-text text-darken-2 center">No Patients Found!</h6></td>
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
<!-- This is the button that is located at the right bottom, that navigates us to patients.create view -->

@endsection