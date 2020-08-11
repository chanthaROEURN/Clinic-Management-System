<ul id="slide-out" class="sidenav sidenav-fixed grey lighten-4" style="width: 219px">
    <li>
        <div class="user-view " style="background-color: gray">
           <!--  <div class="background">
            </div> -->
            {{-- Get picture of authenicated user --}}
            <!-- <a href="{{route('auth.show')}}"><img class="circle" src="{{ URL::to('/img/me.jpg') }}"></a> -->
            {{-- Get first and last name of authenicated user --}}
            <a href="{{route('auth.show')}}"><span class="white-text name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a>
            {{-- Get email of authenicated user --}}
            <a href="{{route('auth.show')}}"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/dashboard"><i class="material-icons">vpn_key</i>Home</a>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/employees"><i class="material-icons">group_work</i>Patient</a>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header"><i class="material-icons pl-15">vertical_split</i><span class="pl-15">System </span></a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="/departments" class="waves-effect waves-grey">
                                <i class="material-icons">business</i>
                                Room
                            </a>
                        </li>
                        <!-- <li>
                            <a href="/salaries" class="waves-effect waves-grey">
                                <i class="material-icons">attach_money</i>
                                Price
                            </a>
                        </li> -->
                        <li>
                            <a href="/divisions" class="waves-effect waves-grey">
                            <i class="material-icons">business</i>
                                Symptoms
                            </a>
                        </li>
                        <!-- <li>
                            <a href="/cities" class="waves-effect waves-grey">
                            <i class="material-icons">location_city</i>
                                City
                            </a>
                        </li>
                        <li>
                            <a href="/states" class="waves-effect waves-grey">
                            <i class="material-icons">grid_on</i>
                                State
                            </a>
                        </li>
                        <li>
                            <a href="/countries" class="waves-effect waves-grey">
                            <i class="material-icons">terrain</i>
                                Country
                            </a>
                        </li> -->
                        <li>
                            <a href="/reports" class="waves-effect waves-grey">
                                <i class="material-icons">insert_drive_file</i>
                                Report
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li>
        <a href="/admins" class="waves-effect waves-grey"><i class="material-icons">account_circle</i>Admin</a>
    </li>
</ul>
