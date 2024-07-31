@extends('layouts.app')
@section('content')
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Unit</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('unit.create')}}" class="btn btn-primary">New Unit</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<div class="container">
					<h2>Unit Table</h2>
					<p>Here shows the unit table</p>            
					<table class="table table-striped">
					  <thead>
						<tr>
							@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}  
							</div>
						@endif
							<th>ID</th>
							<th>Category Name</th>
							<th>Description</th>
					        <th>Status</th>
							<th>Status </th>
							<th>Status Icon</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					  </thead>

					  @foreach ($units as $unit)
					  <tr>
						  <td>{{$unit->id}}</td>
						  <td>{{$unit->name}}</td>
						  <td>{{$unit->description}}</td>
						  <td>{{$unit->status}}</td>

						 <td class = "center">

							@if($unit->status==1)
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
								@if($unit->status == 1)
									<a href="{{ route('unit_Status', $unit->id) }}" class="btn btn-success">
										<i class="glyphicon glyphicon-thumbs-up"></i>
									</a>
								@else
									<a href="{{ route('unit_Status', $unit->id) }}" class="btn btn-danger">
										<i class="glyphicon glyphicon-thumbs-down"></i>
									</a>
								@endif
							</div>
						</td>
						  

						   <td>
							  <a href="{{route('unit.edit', $unit->id)}}"><button class = "btn btn-primary">Edit</button></a>
						  </td>
						  <td>
							  <form method = 'POST' value = "Delete" action="{{ route('unit.destroy', ['unit' => $unit->id]) }}">
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