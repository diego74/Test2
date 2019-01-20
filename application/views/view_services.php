<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Servicios</title>
	<!-- load bootstrap CSS stored in assests/css folder -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">

	<style type="text/css">

		.column {
			width: 100%;
			padding-left: 10px;
			padding-top: 10px;
			margin-bottom: 0px;
		}

		.column-btn {
			width: 100%;
			padding-left: 10px;
			padding-top: 10px;
			padding-bottom: 10px;
			margin-bottom: 0px;
		}

		.card-service {
			padding-left: 15px;
			padding-top: 10px;
			padding-right: 15px;
		}

		.card-descript {
			padding-left: 15px;
			padding-right: 15px;
		}

		td {
			font-size: 15px;
			padding: 0 10px;
			text-align: justify;
			vertical-align: top;
		}

		.tag{
			margin-bottom: 0.75rem;
			/* color:#646464; */
		}

		.tag:hover {
			cursor:pointer;
			/* color:black; */
			font-weight:bold;
		}

		.rigth {
			float:right;
			width:100%;
		}

	</style>
</head>
<body>

	<main role="main">
	    <div class="container">
	    	<div class="col-lg-12 col-md-12 col-sm-12">
	        	<div class="row">
	            	<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 40px">

						<center><a style="font-size: 28px;"><p><strong>Servicios</strong></p></a></center>

						<div class="card" style="margin-bottom: 20px;">

							<div class="column" style="background-color:#f1f1f1;">
								<table>
									<tr>
											<td>
												<a style="font-size: 14px;" onclick="setTag(0)" id="tag_0"><p class="tag">Todos</p></a>
											</td>


										<!-- start printing the data of allservices using a foreach loop -->
										<?php foreach ($alltag as $row) : ?>

											<td>
												<a style="font-size: 14px;" onclick="setTag(<?php echo $row->id; ?>)" id="tag_<?php echo $row->id; ?>"><p class="tag"><?php echo $row->name; ?></p></a>
											</td>

										<?php endforeach; ?>
										<!-- end foreach loop -->

									</tr>
								</table>
							</div>
						</div>

						<table class="rigth">
							<tr>

								<td width="65%" style="padding-left: 0px;">

									<div id="product_cards">

										<div class="row">

											<!-- start printing the data of allservices using a foreach loop -->
											<?php foreach ($allservices as $row) : ?>

												<!-- This part within the for loop will be printed again and again with the data rows in the database -->
												<div class="col-lg-4 col-md-12 col-sm-12" id="service-card">

													<div class="card" style="margin-bottom: 20px;">

														<div class="card-service">
															<a style="font-size: 16px;"><p><strong><?php echo $row->name; ?></strong></p></a>
														</div>

														<div class="card-descript">
															<a style="font-size: 12px;"><p><?php echo $row->description; ?></p></a>
														</div>

														<div class="column" style="background-color:#f1f1f1;">

															<table>
																<tr>
																	<td>
																		<a style="font-size: 12px;" href="#" onclick="sEdit(<?php echo $row->id; ?>)"><p class="card-title">Editar</p></a>
																	</td>
																	<td>
																		<a style="font-size: 12px;" href="#" onclick="sDelete(<?php echo $row->id; ?>)"><p class="card-title">Eliminar</p></a>
																	</td>
																</tr>
															</table>

														</div>
													</div>

												</div>

											<?php endforeach; ?>
											<!-- end foreach loop -->

											</div>
										</div>

									</div>

								</td>

								<td width="35%" style="padding-right: 0px;">

									<div class="card" style="margin-bottom: 20px;">

										<div class="card-service">
											<a style="font-size: 18px;"><p><strong>Servicio</strong></p></a>
										</div>

										<div class="card-service">

												<div class="form-group">
													Nombre
													<input type="text" name="name" id="name" class="form-control">
												</div>

												<div class="form-group">
													Descripción
													<input type="text" name="descript" id="descript" class="form-control">
												</div>

										</div>

										<br>

										<div class="column-btn" style="background-color:#f1f1f1;">

											<table>

												<tr>
													<td>
														<button type="button" id="save" class="btn btn-outline-success">Grabar</button>
													</td>
													<td>
														<button type="button" id="cancel" class="btn btn-outline-danger">Cancelar</button>
													</td>
												</tr>

											</table>

										</div>

									</div>

								</td>
							</tr>

						</table>

					</div>
				</div>

				<br>
				<br>
			</div>
		</div>

	</main>

	<input type="hidden" id="tag" value=<?= $tag ?>>
	<input type="hidden" id="id" value=0>

<!-- load jQuery stored in assests/js folder -->
<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!-- load bootstrap JS stored in assests/js folder -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
	var base_url = '<?= base_url(); ?>';
</script>

<script type="text/javascript">

	function setTag(code){

		if(code == 0){
			window.location = base_url;
		}else{
			window.location = base_url + 'type/' + code;
		}

		$('#tag').val(code);

	}

	var tag = '#tag_' + $('#tag').val();
	$(tag).css('font-weight','bold');

	$('#save').click(function (e) {

		var id = $("#id").val();

		if(id != 0){
			var name = $("#name").val();
			var descript = $("#descript").val();

			var parametros = {
					"name" : name,
					"descript" : descript
			};

			$.ajax({
				data:  parametros,
				type: "post",
				url: base_url+'Services/update_service/'+id,
				success: function (data) {
					window.location = base_url;
				}
			});
		}
	});

	$('#cancel').click(function (e) {
		$("#id").val("");
		$("#name").val("");
		$("#descript").val("");
	});

	function sEdit(code){

		if(code){
			$.ajax({
				type: "get",
				url: base_url+'Services/get_service_byid/'+code,
				dataType: "json",
				success: function (data) {
					$("#id").val(data.id);
					$("#name").val(data.name);
					$("#descript").val(data.descript);
				}
        	});
		}
	}

	function sDelete(code){

		if(code){
			$.ajax({
				type: "post",
				url: base_url+'Services/delete_service/'+code,
				success: function (data) {
					window.location = base_url;
				}
			});
		}
	}

</script>

</body>
</html>
