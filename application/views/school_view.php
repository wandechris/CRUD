<html>
    <head>
        <title><?=$page_title ?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
		.row {
			margin-top: 10px;
			padding: 0 10px;
		}
		.clickable {
			cursor: pointer;
		}

		.panel-heading div {
			margin-top: -18px;
			font-size: 15px;
		}
		.panel-heading div span {
			margin-left: 5px;
		}
		.panel-body {
			display: none;
		}
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="http://localhost/CodeIgniter/application/views/js/script.js"></script>
    </head>
    <body>
    	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Students</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Students" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
									<form action="School/save" class="navbar-form navbar-left" method="post">
										<div class="form-group">
											<th>
											<input type="text" class="form-control" placeholder="Firstname" name="firstname">
											</th>
											<th>
											<input type="text" class="form-control" placeholder="Lastname" name= "lastname">
											</th>
											<th>
											<input type="text" class="form-control" placeholder="email" name="email">
											</th>
										</div>
										<th>
										<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Save"/>
										</th>
									</form>

								</tr>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>E-Mail</th>
							</tr>
						</thead>
						<?php if (is_array($result)){ ?>
						<?php foreach($result as $row):?>
						<tbody >
 								<tr>
								<td id=<?php echo  "item1".$row -> id; ?>><?=$row -> id ?></td>
								<td id=<?php echo  "item2".$row -> id; ?>><?=$row -> Firstname ?></td>
								<td id=<?php echo  "item3".$row -> id; ?>><?=$row -> Lastname ?></td>
								<td id=<?php echo  "item4".$row -> id; ?>><?=$row -> Email ?></td>
								
								<td>
								<a id=<?php echo  $row -> id; ?> class="open-EditDialog btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">Edit</a>
								</td>
								
							    <form action=<?php echo "School/del/" . $row -> id; ?> class="navbar-form navbar-left" method="post">
							    <td>
								<input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete"/>
								</td>
								</form>
								</tr>
						</tbody>
						<?php endforeach; ?>
						<?php } ?>
					</table>
				</div>
			</div>
	</div>
	</div>
    	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Update Student Information</h4>
      </div>
      <div class="modal-body">
      	<form role = "form" action="School/update" method="post">
      	<div class="form-group">
       		<input readonly type="text" unselectable="on" id = "id2" name="id2" class="form-control" placeholder="Id">
       	</div>
  		<div class="form-group">
      	<input type="text" id = "firstname" name="firstname" class="form-control" placeholder="Firstname">
      	 </div>
      	 <div class="form-group">
       <input type="text" id = "lastname" name="lastname" class="form-control" placeholder="Lastname">
       </div>
       <div class="form-group">
       <input type="text" id = "email" name="email" class="form-control" placeholder="Email">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="saveSample">Close</button>
        <button type="submit" name = "update" class="btn btn-primary" id="saveSample">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
    </body>
    <script>
			$(document).ready(function(){
				$(".open-EditDialog").on("click", function(){
					$essay_id = $(this).attr('id');
					$("#myModal").modal('show');
					$("#id2").val($("#item1"+$essay_id).text());
					console.log($("#item1"+$essay_id).text())
					$("#firstname").val($("#item2"+$essay_id).text());
					$("#lastname").val($("#item3"+$essay_id).text());
					$("#email").val($("#item4"+$essay_id).text());
				});
			})
		</script>
</html>