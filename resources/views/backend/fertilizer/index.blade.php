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
	            <h5 class="breadcrumbs-title">Fertilizer</h5>
	            <ol class="breadcrumbs">
	                <li><a href=" {{ url('/admin') }} ">Dashboard</a></li>
	                <li><a href="#">Fertilizer</a></li>
	                <li class="active">List of Recommended Fertilizer</li>
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
	                    <a href="/admin/fertilizer/add"><button class="btn">Add New Fertilizer</button></a>
	                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Crop Name</th>
	                            <th>Fertilizer Usage</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                 
	                    <tfoot>
	                        <tr>
	                            <th>ID</th>
	                            <th>Crop Name</th>
	                            <th>Fertilizer Usage</th>
	                            <th>Action</th>
	                        </tr>
	                    </tfoot>
	                 
	                    <tbody>
	                        @foreach($fertilizer as $fertilize)
	                        <tr>

	                            <td>{{ $fertilize->id }}</td>
	                            <td>{{ $fertilize->cropName }}</td>
	                            <td>{{ $fertilize->fertilizerUsage }}</td>
	                            <td><a href="/admin/fertilizer/edit/{{ $fertilize->id }}"><button  class="btn ">Update</button></a></td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                  </table>
	                </div>
	              </div>
	            </div>
	        <!--card widgets start-->
	        <div id="card-widgets">
	            <div class="row">
	                <div class="col s12 m12 l4" style="display: none;">
	                    <div class="map-card">
	                        <div class="card">
	                            <div class="card-image waves-effect waves-block waves-light">
	                                <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
	                            </div>
	                        </div>
	                    </div>io
	                </div>
	        </div>
	        <!--card widgets end-->
	    </div>
	    <!--end container-->
	</section>
	<!-- END CONTENT -->
@endsection