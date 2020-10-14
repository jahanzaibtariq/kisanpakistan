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
		                <h5 class="breadcrumbs-title">Kisan News</h5>
		                <ol class="breadcrumbs">
		                    <li><a href=" {{ url('/admin') }} ">Dashboard</a></li>
		                    <li><a href="#">Kisan News </a></li>
		                    <li class="active">List of Kisan News </li>
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
                                <a href="/admin/kisan/add"><button class="btn">Add Kisan News</button></a>
			                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
			                    <thead>
			                        <tr>
                                        <th>ID</th>
                                        <th>News Topic</th>
                                        <th>News Description</th>
                                        <th>Action</th>
                                    </tr>
			                    </thead>
			                 
			                    <tfoot>
			                        <tr>
                                        <th>ID</th>
                                        <th>News Topic</th>
                                        <th>News Description</th>
                                        <th>Action</th>
                                    </tr>
			                    </tfoot>
			                 
			                    <tbody>
                                    @foreach($newsSql as $news)
			                        <tr>

			                            <td>{{ $news->id }}</td>
			                            <td>{{ $news->newsName }}</td>
			                            <td>{{ $news->newDescription }}</td>
                                        <td><a href="/admin/kisan/delete/{{ $news->id }}"><button  class="btn ">Delete</button></a> </td>
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

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                  
                    <!-- Floating Action Button -->
                    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                        <a class="btn-floating btn-large">
                          <i class="mdi-action-stars"></i>
                        </a>
                        <ul>
                          <li><a href="#" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                          <li><a href="#" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                          <li><a href="#" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                          <li><a href="#" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                        </ul>
                    </div>
                    <!-- Floating Action Button -->

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
@endsection