<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
		<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>


<div class="container">
	
<div class="col-md-12 grid-margin stretch-card mt-3">
						<div class="card">
							<div class="card-body">

								<h6 class="card-title">Form</h6>

								<form class="sub">
									<div class="row mb-3">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">first Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="first name" name="first_name">
										</div>
									</div>
									<div class="row mb-3">
										<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Last Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control"  autocomplete="off" placeholder="last name" name="last_name">
										</div>
									</div>
									

									<div class="row mb-3">
										<label for="exampleFormControlSelect1" class="col-sm-3 col-form-label form-label">Select Input</label>
										<div class="col-sm-9">
												<select class="form-select " name="template" id="exampleFormControlSelect1">
											<option selected="" disabled="">Select your age</option>
											
                                           
                                            
                                                  @foreach($template as $res)
                                                
                                                 <option value="{{$res->name}}" >{{$res->name}}</option> 
                                           
                                            @endforeach

										</select>
										</div>
									
									</div>                        

									


									<button type="submit" class="btn btn-primary me-2">Submit</button>
									<button class="btn btn-secondary">Cancel</button>
								</form>

							</div>
						</div>
					</div>

</div>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	  <!-- Script -->
	  <script type="text/javascript">
             $(".sub").submit(function(event) {
			event.preventDefault();
			let dataa=$(".sub").serializeArray();			
            dataa.push({ name: "_token", value: "{{ csrf_token() }}" });
			$.ajax({
                
	            url: "{{ url('test') }}",
              
	            data: dataa,
	            type: "post",
	            async: false,
	            dataType: 'json',
	            success: function(response){
	              console.log(response);
	               
	                
	            },
	        
          });
		});

     </script>
</body>
</html>