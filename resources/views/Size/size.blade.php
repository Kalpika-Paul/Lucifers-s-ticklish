@extends('layouts.app')
@section('content')
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
				
				

		@endsection