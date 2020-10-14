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
	            <h5 class="breadcrumbs-title">Watering Support</h5>
	            <ol class="breadcrumbs">
	                <li><a href=" {{ url('/admin') }} ">Dashboard</a></li>
	                <li><a href="#">Watering</a></li>
	                <li class="active">List of Watering Support</li>
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
	                    <a href="/admin/watering/add"><button class="btn">Add New Watering Method</button></a>
	                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Crop Name</th>
	                            <th>Watering Method</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tfoot>
	                        <tr>
	                            <th>ID</th>
	                            <th>Crop Name</th>
	                            <th>Watering Methods</th>
	                            <th>Action</th>
	                        </tr>
	                    </tfoot>
	                 
	                    <tbody>
	                        @foreach($waterings as $watering)
	                        <tr>

	                            <td>{{ $watering->id }}</td>
	                            <td>{{ $watering->cropName }}</td>
	                            <td>{{ $watering->wateringMethods }}</td>
	                            <td><a href="/admin/watering/edit/{{ $watering->id }}"><button  class="btn ">Update</button></a></td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                  </table>
	                </div>
	              </div>
	            </div>

	</section>
	<!-- END CONTENT -->
@endsection