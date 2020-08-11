@extends('layouts.app')
@section('content')
    <br>
    <div>
        <div class="row white-text center">
            <a href="/admins" class="white-text">
                <div class="mx-20 card-panel light-blue lighten-1 col s8 offset-s3 m4 offset-m0 l4 offset-l2 xl2 offset-xl2 ml-14" style="width: 25%">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Admins</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">({{$t_admins}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/patients" class="white-text">
                <div class="mx-20 card-panel teal lighten-1 col s8 offset-s2 m4 l4 xl2" style="width: 25%">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person_outline</i>
                            <h6 class="no-padding txt-md">Patient</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">({{$t_patients}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/departments" class="white-text">
                <div class="mx-20  card-panel green lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2" style="width: 25%">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">account_balance</i>
                            <h6 class="no-padding txt-md">Departments</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">({{$t_departments}})</p>
                        </div>
                    </div>
                </div>
            </a>
         
        </div>
    </div>
    <br>
    {{-- include the chart.js Library --}}
    <script src="{{asset('js/Chart.js')}}"></script>
    
    {{-- Create the chart with javascript using canvas --}}
    <script>
        // Get Canvas element by its id
        patient_chart = document.getElementById('patient').getContext('2d');
        chart = new Chart(patient_chart,{
            type:'line',
            data:{
                labels:[
                    /*
                        this is blade templating.
                        we are getting the date by specifying the submonth
                     */
                    '{{Carbon\Carbon::now()->subMonths(4)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}'
                    ],
                datasets:[{
                    label:'Employment Last Four Months',
                    data:[
                        '{{$pat_count_4}}',
                        '{{$pat_count_3}}',
                        '{{$pat_count_2}}',
                        '{{$pat_count_1}}'
                    ],
                    backgroundColor: [
                        'rgba(178,235,242 ,1)'
                    ],
                    borderColor: [
                        'rgba(0,150,136 ,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection