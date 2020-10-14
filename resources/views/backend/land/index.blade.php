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
                <h5 class="breadcrumbs-title">Land Preparation</h5>
                <ol class="breadcrumbs">
                    <li><a href=" {{ url('/admin') }} ">Dashboard</a></li>
                    <li><a href="#">Land Preparation </a></li>
                    <li class="active">List of Land Preparation Details	</li>
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
                        <a href="/admin/land/preparation/add"><button class="btn">Add New Land Preparation</button></a>
                      <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Crop Name</th>
                                <th>Land Preparation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                     
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Crop Name</th>
                                <th>Land Preparation</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                     
                        <tbody>
                            @foreach($lands as $land)
                            <tr>

                                <td>{{ $land->id }}</td>
                                <td>{{ $land->cropName }}</td>
                                <td>{{ $land->landPreparation }}</td>
                                <td><a href="/admin/land/preparation/edit/{{ $land->id }}"><button  class="btn ">Update</button></a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
@endsection