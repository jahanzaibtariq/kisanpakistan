@extends('backend.layout.app')
@section('content')
    <!-- START CONTENT -->
    <section id="content">
      	<div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
	        <div class="container">
	            <div class="row">
	              <div class="col s12 m12 l12">
	                <h5 class="breadcrumbs-title">Harvesting</h5>
	                <ol class="breadcrumbs">
	                    <li><a href=" {{ url('/admin') }} ">Dashboard</a></li>
	                    <li><a href="#">Harvesting </a></li>
	                    <li class="active">List of Harvesting Schedule	</li>
	                </ol>
	              </div>
	            </div>
	        </div>
        </div>
        
        <!--start container-->
        <div class="container">
           <div class="section">
	            <!--DataTables example-->
	            <div id="table-datatables">
	              <div class="row">
	                <div class="col s12 m8 l9">
                        <a href="/admin/harvesting/add"><button class="btn">Add New Harvesting Schedule</button></a>
	                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
                                <th>Crop Name</th>
	                            <th>Start Harvesting <br>( DD - MM )</th>
	                            <th>End Harvesting <br>( DD - MM )</th>
	                            <th>Harvesting Method</th>
                                <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tfoot>
	                        <tr>
	                            <th>ID</th>
                                <th>Crop Name</th>
	                            <th>Start Harvesting <br>( DD - MM )</th>
	                            <th>End Harvesting <br>( DD - MM )</th>
	                            <th>Harvesting Method</th>
                                <th>Action</th>
	                        </tr>
	                    </tfoot>
	                    <tbody>
                            @foreach($harvestings as $harvesting)
	                        <tr>
	                            <td>{{ $harvesting->id }}</td>
	                            <td>{{ $harvesting->cropName }}</td>
	                            <td>{{ $harvesting->startHarvesting_day }} - {{ $harvesting->startHarvesting_month }}</td>
	                            <td>{{ $harvesting->endHarvestin_day }} - {{ $harvesting->endHarvesting_month }}</td>
	                            <td>{{$harvesting->harvestingMethod}}</td>
                                <td><a href="/admin/harvesting/edit/{{ $harvesting->id }}"><button  class="btn ">Update</button></a></td>
	                        </tr>
                            @endforeach
	                    </tbody>
	                  </table>
	                </div>
	            </div>
	        </div>
        </div>
        <!--end container-->
    </section>
    <!-- END CONTENT -->
@endsection