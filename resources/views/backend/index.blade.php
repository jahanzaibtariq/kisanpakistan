@extends('backend.layout.app')
@section('content')
<!-- START CONTENT -->
<section id="content">
    <!--start container-->
    <div class="container">
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!--card stats start-->
        <h1>Quick Action</h1>
        <div id="card-stats">
            <div class="row">
                <a href="{{url('/admin/crop')}}">
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content  green white-text">
                                <p class="card-stats-title">Crops Detail</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{url('/admin/land/preparation')}}">
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content pink lighten-1 white-text">
                                <p class="card-stats-title">Land Preparation Details</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{url('/admin/weed')}}">
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content blue-grey white-text">
                                <p class="card-stats-title"> Weed Eradication</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{url('/admin/harvesting')}}">
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content purple white-text">
                                <p class="card-stats-title">Harvesting Schedule</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--end container-->
</section>
@endsection