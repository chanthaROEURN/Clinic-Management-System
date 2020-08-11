@extends('layouts.app')
@section('content')
    <div class="container" style="width: 100%">
        <div class="card-panel grey-text text-darken-2 mt-20">
            <h4 class="grey-text text-darken-1 center">Patient Details</h4>
            <div class="row">
                <div class="row collection mt-20">
                    <!-- Show this image on small devices -->
                    <div class="hide-on-med-only hide-on-large-only row">
                        <div class="col s8 offset-s2 mt-20">
                            <img class="p5 card-panel emp-img-big" src="{{asset('storage/patient_images/'.$patient->picture)}}">
                        </div>
                    </div>
                    <div class="col m8 l8 xl8">
                       
                        <h5 class="pl-15 mt-20">{{$patient->first_name}} {{$patient->last_name}}</h5>
                        <p class="pl-15 mt-20"><i class="material-icons left">location_city</i>{{$patient->address}}</p>
                        <p class="pl-15"><i class="material-icons left">location_on</i>{{$patient->patCity->city_name}}, {{$patient->patState->state_name}}, {{$patient->patCountry->country_name}}</p>
                        <p class="pl-15"><i class="material-icons left">person_outline</i>{{$patient->patGender->gender_name}}</p>
                    </div>
                    <!-- Hide this image on small devices -->
                    <div class="hide-on-small-only col m4 l4 xl3">
                        <img class="p5 card-panel emp-img-big" src="{{asset('storage/patient_images/'.$patient->picture)}}">
                    </div>
                </div>
                <div class="collection">
                    <div class=" row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Age :</span><span class="col m8 l8 xl9">{{$patient->age}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Phone :</span><span class="col m8 l8 xl9">{{$patient->phone}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Zip Code :</span><span class="col m8 l8 xl9">{{$patient->patCity->zip_code}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Room :</span><span class="col m8 l8 xl9">{{$patient->patDepartment->dept_name}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Symptom :</span><span class="col m8 l8 xl9">{{$patient->patDivision->division_name}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Email :</span><span class="col m8 l8 xl9">{{$patient->email}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Price :</span><span class="col m8 l8 xl9">${{$patient->patSalary->s_amount}}/-</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Start Date :</span><span class="col m8 l8 xl9">{{$patient->join_date}}</span></p>
                    </div>
                    <div class="row">
                        <p class="pl-15"><span class="bold col s5 m4 l4 xl3">Leave Date :</span><span class="col m8 l8 xl9">{{$patient->birth_date}}</span></p>
                    </div>
                </div>
                <form action="{{route('patients.destroy',$patient->id)}}" method="POST">
                    @method('DELETE')
                    @csrf()
                    <button class="btn red col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" type="submit">Delete</button>
                </form>
                <a class="btn orange col s3 offset-s2 m3 offset-m2 l3 offset-l2 xl3 offset-xl2" href="{{route('patients.edit',$patient->id)}}">Update</a>
            </div>
        </div>
    </div>
@endsection