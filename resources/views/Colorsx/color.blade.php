@extends('layouts.app')
@section('content')
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Color</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('color.create')}}" class="btn btn-primary">Add Color</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<div class="container">
					<h2>Color Table</h2>
					<p>Here shows the color table</p>            
					<table class="table table-striped">
					  <thead>
						<tr>
							@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}  
							</div>
						@endif
							<th >ID</th>
							<th>Name</th>
							
						    <th>Status</th>
							<th>Status </th>
							<th>Status Icon</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					  </thead>

					  @foreach ($colors as $color)
					  <tr>
						  <td>{{$color->id}}</td>
						  <td>{{$color->color}}</td>
						
						  <td>{{$color->status}}</td>

						 <td class = "center">

							@if($color->status==1)
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

						 <td class = "row">
							<div class ="span1"></div>
							<div class = "span2">
		 
						 
						 @if($color->status == 1)
						 <a href="{{ route('color_Status', $color->id) }}" class="btn btn-success">
							 <i class="glyphicon glyphicon-thumbs-up"></i>
						 </a>
					 @else
						 <a href="{{ route('color_Status', $color->id) }}" class="btn btn-danger">
							 <i class="glyphicon glyphicon-thumbs-down"></i>
						 </a>
					 @endif
							</td>
								   
		 

			
						  

						   <td>
							  <a href="{{route('color.edit',$color->id)}}"><button class = "btn btn-primary">Edit</button></a>
						  </td>
						  <td>
							  <form method = 'POST' value = "Delete" action="{{route('color.destroy', $color->id) }}">
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
				
				 

			<!-- /.content-wrapper -->
		@endsection