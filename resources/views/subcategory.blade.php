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
                   

				   <div class = "span2">

                  @if($subcategory->status == 1)
				<a href="{{ route('Subcategory.change_Status', $subcategory->id) }}" class="btn btn-success">
					<i class="glyphicon glyphicon-thumbs-up"></i>
				</a>
			   @else
				<a href="{{ route('Subcategory.change_Status', $subcategory->id) }}" class="btn btn-danger">
					<i class="glyphicon glyphicon-thumbs-down"></i>
				</a>
			   @endif
			     </div>
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
			@endsection