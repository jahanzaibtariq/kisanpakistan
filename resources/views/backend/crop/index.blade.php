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
	            <h5 class="breadcrumbs-title">Crop</h5>
	            <ol class="breadcrumbs">
	                <li><a href=" {{ url('/admin') }} ">Dashboard</a></li>
	                <li><a href="#">crop</a></li>
	                <li class="active">List of Crops</li>
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
	                <div class="col s12 m12 l9">
	                    <a href="/admin/crop/add"><button class="btn">Add New Crop</button></a>
	                  <table id="data-table-simple" class="responsive-table display">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Crop Name</th>
	                            <th>Crop Description</th>
	                            <th>Min. PH</th>
	                            <th>Max. Ph</th>
	                            <th>Min. Temprature C</th>
	                            <th>Max. Temperature C</th>
	                            <th>Min. Moisture %</th>
	                            <th>Max. Moisture %</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tfoot>
	                        <tr>
	                            <th>ID</th>
	                            <th>Crop Name</th>
	                            <th>Crop Description</th>
	                            <th>Min. PH</th>
	                            <th>Max. Ph</th>
	                            <th>Min. Temprature</th>
	                            <th>Max. Temperature</th>
	                            <th>Min. Moisture %</th>
	                            <th>Max. Moisture %</th>
	                            <th>Action</th>
	                        </tr>
	                    </tfoot>
	                 
	                    <tbody>
	                        @foreach($sqlcrop as $sql)
	                        <tr>

	                            <td>{{ $sql->crop_id }}</td>
	                            <td>{{ $sql->cropName }}</td>
	                            <td>{{ $sql->cropDescription }}</td>
	                            <td>{{ $sql->min_PH }}</td>
	                            <td>{{ $sql->max_ph_No }}</td>
	                            <td>{{ $sql->min_temp }}</td>
	                            <td>{{ $sql->max_temp_C }}</td>
	                            <td>{{ $sql->min_humidity  }}</td>
	                            <td>{{ $sql->max_humidity_per }}</td>
	                            <td>
	                                <a href="/admin/crop/edit/{{ $sql->crop_id }}" class="icon-preview"><i class="mdi-editor-border-color" style="font-size: 25px;"></i></a> 
	                                <a href="/admin/crop/delete/{{ $sql->crop_id }}/{{ $sql->cropName }}"><i class=" tiny mdi-action-delete" style="font-size: 25px;"></i></a>
	                            </td>
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