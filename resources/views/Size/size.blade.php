<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item"><a href="categories.html">Size</a></li>
						<li class="breadcrumb-item active">List</li>
					</ol>
				</div>
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="{{asset('admin-assets/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>Mohit Singh</strong></h4>
							<div class="mb-3">example@example.com</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Settings								
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-lock mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<a href="{{route('logout')}}" class="dropdown-item text-danger">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout							
							</a>							
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
            @include('layouts.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Size Module</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('size.create')}}" class="btn btn-primary">Add Sizes</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<div class="container">
					<h2>Size Table</h2>
					<p>Here shows the Size table</p>            
					<table class="table table-striped">
					  <thead>
						<tr>
							@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}  
							</div>
						@endif
							<th>ID</th>
							<th>Size </th>
							<th>Status</th>
							<th>Status </th>
							<th>Status Icon</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					  </thead>

					  @foreach ($sizes as $size)
					  <tr>
						  <td>{{$size->id}}</td>
						  <td>{{$size->size}}</td>
						  <td>{{$size->status}}</td>

						 <td class = "center">

							@if($size->status==1)
							<span style = "padding: 10px 15px  " 
							class= "label label-success">
                                Active
							</span>
							@else
							<span style = "padding: 10px 15px  "  class= "label label-danger">
                                Deactive
							</span>
							@endif
							@if (session('message'))
							
							
						
                            @endif

						 </td>

						 <td class="row">
							<div class="span1"></div>
							<div class="span2">
								
								@if($size->status == 1)
									<a href="{{ route('size_Status', $size->id) }}" class="btn btn-success">
										<i class="glyphicon glyphicon-thumbs-up"></i>
									</a>
								@else
									<a href="{{ route('size_Status', $size->id) }}" class="btn btn-danger">
										<i class="glyphicon glyphicon-thumbs-down"></i>
									</a>
								@endif
							</div>
						</td>
						  

						   <td>
							  <a href="{{route('size.edit',$size->id)}}"><button class = "btn btn-primary">Edit</button></a>
						  </td>
						  <td>
							  <form method = 'POST' value = "Delete" action="{{route('size.destroy',$size->id)}}">
								  @csrf
								  @method('DELETE')

								  <button class = "btn btn-danger">Delete</button>
							  </form> 
							  
						  </td> 
						
					  </tr>
				  @endforeach 

			  </thead>
			  
			  
		  </table>								
				  </div>
				
				

							<div class="card-footer clearfix">
								<ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset('admin-assets/js/demo.js')}}"></script>
	</body>
</html>