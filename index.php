<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		body{
			margin: 5% auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			<div class="container" id="addStudentdiv">
		
				<h4 class=""> Add New Student </h4>
		

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="addstudent.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label"> Profile </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="profile" name="profile">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Email </label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="name" placeholder="Enter Email" name="email">
					    </div>
					</div>

					<fieldset class="form-group">
					    <div class="row">
					    	<legend class="col-form-label col-sm-2 pt-0"> Gender </legend>
					      
					      	<div class="col-sm-10">
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
					          		<label class="form-check-label" for="male">
					            		Male
					          		</label>
					        	</div>
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
					          		<label class="form-check-label" for="female">
					            		Female
					          		</label>
					        	</div>
					        
					      </div>
					    </div>
					</fieldset>

					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label"> Address </label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="5" name="address"></textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			SAVE
					   		</button>
					    </div>
					</div>


				</form>
			</div>
			</div>
		</div>
		<!-- update -->
		<div class="container" id="editStudentdiv">
		
				<h4 class=""> Edit Student </h4>
		

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="updatestudent.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="edit_id" id="edit_id">
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label"> Profile </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="edit_profile" name="edit_profile">
					    	<input type="hidden" name="old_photo" id="old_photo">
					    	<img src="" id="edit_img" width="100px" height="100" class="d-block mt-1">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="edit_name" placeholder="Enter Name" name="edit_name">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Email </label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="edit_email" placeholder="Enter Email" name="edit_email">
					    </div>
					</div>

					<fieldset class="form-group">
					    <div class="row">
					    	<legend class="col-form-label col-sm-2 pt-0"> Gender </legend>
					      
					      	<div class="col-sm-10">
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="edit_gender" id="edit_male" value="Male" checked>
					          		<label class="form-check-label" for="male">
					            		Male
					          		</label>
					        	</div>
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="edit_gender" id="edit_female" value="Female">
					          		<label class="form-check-label" for="female">
					            		Female
					          		</label>
					        	</div>
					        
					      </div>
					    </div>
					</fieldset>

					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label"> Address </label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="5" id="edit_address" name="edit_address"></textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			Update
					   		</button>
					    </div>
					</div>


				</form>
			</div>
			</div>
		</div>
			</div>

			<div class="col-md-8">
					<table class="table table-bordered">
		<thead>
			<tr>
				<th> # </th>
				<th> Name </th>
				<th> Gender </th>
				<th> Email </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>

			</div>
		
		</div>
	</div>
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function(){
		$("#addStudentdiv").show();
		$("#editStudentdiv").hide();
		showdata();
		function showdata(){
			$.get('student.json',function(response){
     	if(response){
     		var html='';
     		var j=1;
     		$.each(response,function(i,v){
     			html+=`<tr>
     			<td>${j++}</td>
     			<td>${v.name}</td>
     			<td>${v.gender}</td>
     			<td>${v.email}</td>
     			<td>
     				<button class='btn btn-primary btn-sm detail' data-id='${i}' data-name='${v.name}'
     				data-gender='${v.gender}' data-email='${v.email}' data-address='${v.address}' data-profile='${v.profile}'

     				>Detail</button>
     				<button class='btn btn-warning btn-sm edit' data-id='${i}'>Edit</button>
     				<button class='btn btn-danger btn-sm delete' data-id='${i}'>Delete</button>

     			</td>
     			</tr>`;
     		});
     		$("tbody").html(html);
     	}

     });
	}

	$("tbody").on('click','.detail',function(){
		var id =$(this).data('id');
		var name=$(this).data('name');
		var email=$(this).data('email');
		var gender=$(this).data('gender');
		var address=$(this).data('address');
		var profile=$(this).data('profile');

		$("#stu_img").attr('src',profile);


			$("#stu_name").text('name :'+name);
			$("#stu_email").text('email :'+email);
			$("#stu_gender").text('gender :'+gender);
			$("#stu_address").text('address: '+address);

		$("#detailModal").modal('show');
	});

	$("tbody").on('click','.delete',function(){
		var id=$(this).data('id');
		var ans=confirm("Are U Sure Delete?");

		if(ans){
			$.post('deletestudent.php',{id:id},function(){
				showdata();
			});
		}

	});

	$("tbody").on('click','.edit',function(){
		$("#addStudentdiv").hide();
		$("#editStudentdiv").show();
		var id =$(this).data('id');


		$.get('student.json',function(response){
			if(response){
				var data_arr=response;	

				var edit_name=data_arr[id].name;

				var edit_email=data_arr[id].email;
				var edit_gender=data_arr[id].gender;
				var edit_address=data_arr[id].address;
				var edit_profile=data_arr[id].profile;


				$("#edit_id").val(id);
				$("#edit_img").attr("src",edit_profile);
				$("#edit_name").val(edit_name);
				$("#edit_email").val(edit_email);
				$("#edit_address").val(edit_address);
				$("#old_photo").val(edit_profile);

				if(edit_gender=="Male"){
					$("#edit_male").prop("checked","checked");
				}else{
					$("#edit_female").prop("checked","checked");

				}
			}
		});

	});
     
});
	
</script>
<!-- Modal -->
<div class="modal fade" id="detailModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-4">
        		<img src="" id="stu_img" class="img-fluid">
        	</div>
        	<div class="col-8">
        		<p id="stu_name"></p>
        		<p id="stu_email"></p>
        		<p id="stu_gender"></p>
        		<p id="stu_address"></p>
        	
        	</div>
        </div>
      </div>
     
    </div>
  </div>
</div>
</body>
</html>