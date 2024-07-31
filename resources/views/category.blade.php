 @extends('layouts.app')

 @section('content')
			
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Categories</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<div class="container">
					<h2>Category Table</h2>
					<p>Here shows the category table</p>            
					<table class="table table-striped">
					  <thead>
						<tr>
							@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}  
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span><script>
							  document.querySelector('.close').addEventListener('click', function () {
                              document.getElementById('myAlert').style.display = 'none';
                              });
						</script>
								  </button>
							</div>
						
							@endif
							
                            <th >ID</th>
							<th>Category Name</th>
							<th>Description</th>
							<th>Image</th>
							<th>Status</th>
							<th>Status </th>
							<th>Status Icon</th>
							<th>Edit</th>
							<th>Delete</th>

						</tr>
					  </thead>

					  @foreach ($categories as $category)
					  <tr>
						  <td>{{$category->id}}</td>
						  <td>{{$category->name}}</td>
						  <td>{{$category->description}}</td>
						  <td>{{$category->image}}</td> 
						  <td>{{$category->status}}</td>

						 <td class = "center">

							@if($category->status==1)
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

				
				@if($category->status == 1)
				<a href="{{ route('changeStatus', $category->id) }}" class="btn btn-success">
					<i class="glyphicon glyphicon-thumbs-up"></i>
				</a>
			@else
				<a href="{{ route('changeStatus', $category->id) }}" class="btn btn-danger">
					<i class="glyphicon glyphicon-thumbs-down"></i>
				</a>
			@endif
			       </td>
						  

						   <td>
							  <a href="{{route('category.edit', $category->id)}}"><button class = "btn btn-primary">Edit</button></a>
						  </td>
						  <td>
							  <form method = 'POST' value = "Delete" action="{{ route('category.destroy', ['category' => $category->id]) }}">
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


						