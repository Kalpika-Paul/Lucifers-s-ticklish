@extends('layouts.app')
@section('content')
			
			<!-- Content Wrapper. Contains page content -->
			
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							
							<div class="col-sm-6">
								<h1>SubCategories</h1>
							</div>

							<div class="col-sm-6 text-right">
								<a href="{{ route('subcategory.create') }}" class="btn btn-primary">New SubCategory</a>
							</div>

						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<div class="container">
					<h2>Sub Category Table</h2>
					<p>Here shows the subcategory table</p>            
					<table class="table table-striped">
					  <thead>
						<tr>
							@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}  
							</div>
						@endif
							<th >ID</th>
							<th >Sub Category Name</th>
							<th >Category  Name</th>
						    <th >Description</th>
							<th>Status</th>
							<th>Visual</th>
							<th> Status Icon</th>
							<th >Edit</th>
							<th >Delete</th>
						</tr>
					  </thead>
					   @foreach ($subcategories as $subcategory)
					  <tr>
						
						  <td>{{$subcategory->id}}</td>
						  <td>{{$subcategory->name}}</td>
                          <td>{{$subcategory->category->name}}</td>
						  
						  <td>{{$subcategory->description}}</td>
						  <td>{{$subcategory->status}}</td>
						  <td>{{$subcategory->image}}</td>

						  <td class = "center">
							<td class = "center">

								@if($subcategory->status==1)
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
	
					
					@if($subcategory->status == 1)
					<a href="{{ route('changeStatus', $subcategory->id) }}" class="btn btn-success">
						<i class="glyphicon glyphicon-thumbs-up"></i>
					</a>
				@else
					<a href="{{ route('changeStatus', $subcategory->id) }}" class="btn btn-danger">
						<i class="glyphicon glyphicon-thumbs-down"></i>
					</a>
				@endif
					   </td>
							  
			       </td>
						  

						

						   <td>
							  <a href="{{route('subcategory.edit', $subcategory->id)}}"><button class = "btn btn-primary">Edit</button></a>
						  </td>
						 
						  <td>
							  <form method = 'POST' value = "Delete" action="{{ route('subcategory.destroy', ['subcategory' => $subcategory->id]) }}">
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