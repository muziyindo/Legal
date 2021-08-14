					<div class="m-content">
					
						<div class="row">
							<div class="col-lg-12">
							
							<!--Modal for status change-->
									<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
									<div class="modal-dialog">
										<div class="modal-content" style="border-radius:0 !important">
											<div class="modal-header" style="background:#2a5290; color:#fff">
												NOTIFICATION
											</div>
											<div class="modal-body">
												<b>Contract successfully Updated</b>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger btn-ok" style="background:#2a5290; border:0" data-dismiss="modal">Close</button>
												
											</div>
										</div>
									</div>
									</div>
									
									<p>
										<div id="doc_error" style="color:red; font-weight:bold; text-align:center"><?php echo validation_errors();?></div>
									</p>
							
							<!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Requester Information
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_contract" enctype="multipart/form-data" accept-charset="utf-8" method="post" >
									
									
									
									
									
										<div id="disable-fields">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Title:
													</label>
													<select name="requester_title" class="form-control m-input">
														<option value="">-select-</option>
														<option value="Miss" <?php  if($contract_details[requester_title]=="Miss")echo "selected" ?>>Miss</option>
														<option value="Mrs" <?php  if($contract_details[requester_title]=="Mrs")echo "selected" ?>>Mrs</option>
														<option value="Mr" <?php  if($contract_details[requester_title]=="Mr")echo "selected" ?>>Mr</option>
														
													</select>
													<span class="m-form__help">
														Please select your title
													</span>
												</div>
												<div class="col-lg-4">
													<label>
														Full Name:
													</label>
													<div class="input-group m-input-group m-input-group--square">
														<span class="input-group-addon">
															<i class="la la-user"></i>
														</span>
														<input type="text" name="requester_name" class="form-control m-input" placeholder="" value="<?php  echo $contract_details[requester_name] ?>">
													</div>
													<span class="m-form__help">
														Please enter your fullname
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Department:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter department" name="requester_dept" value="<?php  echo $contract_details[requester_dept] ?>">
													<span class="m-form__help">
														Please enter your department
													</span>
												</div>
												
											</div>
											
											
										</div>
										
										
										
										<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Other Party Personal Information
												</h3>
											</div>
										</div>
										</div>
										
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Title:
													</label>
													<select name="other_party_title" class="form-control m-input">
														<option value="">-select-</option>
														<option value="Miss" <?php  if($contract_details[other_party_title]=="Miss")echo "selected" ?>>Miss</option>
														<option value="Mrs" <?php  if($contract_details[other_party_title]=="Mrs")echo "selected" ?>>Mrs</option>
														<option value="Mr" <?php  if($contract_details[other_party_title]=="Mr")echo "selected" ?>>Mr</option>
														
													</select>
													<span class="m-form__help">
														Please select your title
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Name:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_name" value="<?php  echo $contract_details[other_party_name] ?>">
													<span class="m-form__help">
														Please enter other party name
													</span>
												</div>
												<div class="col-lg-4">
													<label>
														Service Location:
													</label>
													<div class="input-group m-input-group m-input-group--square">
														<span class="input-group-addon">
															<i class="la la-user"></i>
														</span>
														<input type="text" class="form-control m-input" placeholder="enter service location" name="service_location" value="<?php  echo $contract_details[service_location] ?>">
													</div>
													<span class="m-form__help">
														Please enter service location
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label class="">
														Authorized Signatory:
													</label>
													<div class="m-radio-inline">
														<label class="m-radio m-radio--solid">
															<input type="radio" name="authorized_signatory" value="1" <?php  if($contract_details[authorized_signatory]==1)echo "checked" ?>>
															Signed
															<span></span>
														</label>
														<label class="m-radio m-radio--solid">
															<input type="radio" name="authorized_signatory" value="2" <?php  if($contract_details[authorized_signatory]==2)echo "checked" ?>>
															Not Signed
															<span></span>
														</label>
													</div>
													<span class="m-form__help">
														<!--Please select user group-->
													</span>
												</div>
											</div>
											
										</div>
										
										
										
										
										<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Other Party Contact Information
												</h3>
											</div>
										</div>
										</div>
										
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Phone Number:
													</label>
													<input type="number" class="form-control m-input" placeholder="Enter phone number" name="phone_no" value="<?php  echo $contract_details[phone_no] ?>">
													<span class="m-form__help">
														Please enter phone number
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Email:
													</label>
													<input type="email" class="form-control m-input" placeholder="Enter email" name="email" value="<?php  echo $contract_details[email] ?>">
													<span class="m-form__help">
														Please enter email
													</span>
												</div>
												<div class="col-lg-4">
													<label>
														Address:
													</label>
													<div class="input-group m-input-group m-input-group--square">
														<span class="input-group-addon">
															<i class="la la-user"></i>
														</span>
														<input type="text" class="form-control m-input" placeholder="" name="address" value="<?php  echo $contract_details[address] ?>">
													</div>
													<span class="m-form__help">
														Please enter address
													</span>
												</div>
											</div>
											
										</div>
										
										
										
										
										<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Other Party Contract Information
												</h3>
											</div>
										</div>
										</div>
										
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Contract Duration (in months):
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter contract duration" name="contract_duration" value="<?php  echo $contract_details[contract_duration] ?>">
													<span class="m-form__help">
														Please enter contract duration
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Proposed Start Date:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter start date" id="m_datepicker_1" data-date-format="yyyy/mm/dd" readonly name="proposed_start_date" value="<?php  echo $contract_details[proposed_start_date] ?>">
													<span class="m-form__help">
														Please enter proposed start date
													</span>
												</div>
												<div class="col-lg-4">
													<label>
														Proposed End Date:
													</label>
													<div class="input-group m-input-group m-input-group--square">
														<span class="input-group-addon">
															<i class="la la-user"></i>
														</span>
														<input type="text" class="form-control m-input" placeholder="" id="m_datepicker_2" data-date-format="yyyy/mm/dd" readonly name="proposed_end_date" value="<?php  echo $contract_details[proposed_end_date] ?>">
													</div>
													<span class="m-form__help">
														Please enter proposed end date
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label class="">
														Terms and Conditions agreed upon:
													</label>
													<input type="file" class="form-control m-input" placeholder="Enter contact number" name="doc_" >
													<span class="m-form__help">
														Attach proposal agreed upon or Sales/Service Order
													</span>
												</div>
												
												<div class="col-lg-8">
												
													<table class="table table-striped">
														<thead>
															<tr>
																<th>
																S/N
																</th>
																<th>
																	Document Type
																</th>
																<th>
																	
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	1
																</td>
																<td>
																	<span style="background:rgb(255,117,117); color:black;"><strong>proposal agreed upon or Sales/Service Order</strong></span>
																</td>
																<td>
																	<a href="<?php echo site_url('App/downloadDoc/'.$contract_details[proposal_agreed_upon]) ?>">Download</a>
																</td>
															</tr>
														</tbody>
													</table>
													
												</div>
												
												
												
										
												
											</div>
											
										</div>
										
										
										
										<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Other Informations
												</h3>
											</div>
										</div>
										</div>
										
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Termination Notice:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter termination notice" name="termination_notice" value="<?php  echo $contract_details[termination_notice] ?>">
													<span class="m-form__help">
														Please enter termination notice
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Payment Term:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter payment term" name="payment_term" value="<?php  echo $contract_details[payment_term] ?>">
													<span class="m-form__help">
														Please enter payment term
													</span>
												</div>
												<div class="col-lg-4">
													<label>
														Lease or sale of equipment:
													</label>
													<div class="input-group m-input-group m-input-group--square">
														<span class="input-group-addon">
															<i class="la la-user"></i>
														</span>
														<input type="text" class="form-control m-input" placeholder="enter Lease or sale of equipment" name="sale_of_equipment" value="<?php  echo $contract_details[sale_of_equipment] ?>">
													</div>
													<span class="m-form__help">
														Please enter Lease or sale of equipment
													</span>
												</div>
											</div>
										</div>
										
										</div>
										
										<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Legal Officer processing outcome
												</h3>
											</div>
										</div>
										</div>
										
								<div class="m-portlet__body">
								
									<div class="form-group m-form__group row">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>
													</th>
													<th>
														Status
													</th>
													<th>
														Comment
													</th>
													
												</tr>
											</thead>
											<tbody>
												<tr>
													
													<th scope="row" style="background:#e9ecef;">
														Review
													</th>
													<td>
														<?php if($contract_details[status]=="Pending_Review" ){ ?>
														pending<div class="m-loader m-loader--brand" style="width: 30px; display: inline-block;"></div>
														<?php } else if($contract_details[status]=="Fail_Review" ){ ?>
														Fail <i class="la la-close" style="color:red; font-weight:bold"></i>
														<?php } else { ?>
														Pass <i class="la la-check" style="color:green; font-weight:bold"></i>
														<?php } ?>
													</td>
													<td>
														<?php echo $contract_details[review_comment] ; ?>
													</td>
													
												</tr>
												<tr>
													<th scope="row">
														Validate
													</th>
													<td>
														<?php if($contract_details[status]=="Fail_Validation"  ){ ?>
														Fail <i class="la la-close" style="color:red; font-weight:bold"></i>
														<?php } else if($contract_details[status]=="Signed_Off" || $contract_details[status]=="Fail_Signoff" || $contract_details[status]=="Pending_Signoff"){ ?>
														Pass <i class="la la-check" style="color:green; font-weight:bold"></i>
														<?php } else { ?>
														pending<div class="m-loader m-loader--brand" style="width: 30px; display: inline-block;"></div>
														<?php } ?>
													</td>
													<td>
														<?php echo $contract_details[validation_comment] ; ?>
													</td>
													
												</tr>
												<tr>
													<th scope="row" style="background:#e9ecef;">
														Sign off
													</th>
													<td>
														<?php if($contract_details[status]=="Signed_Off" ){ ?>
														Pass <i class="la la-check" style="color:green; font-weight:bold"></i>
														<?php } else if($contract_details[status]=="Fail_Signoff" ){ ?>
														Fail <i class="la la-close" style="color:red; font-weight:bold"></i>
														<?php } else { ?>
														pending<div class="m-loader m-loader--brand" style="width: 30px; display: inline-block;"></div>
														<?php } ?>
													</td>
													<td>
														<?php echo $contract_details[signoff_comment] ; ?>
													</td>
													
												</tr>
												
											</tbody>
										</table>
									</div>
								
								</div>
								
								
									<?php if($role=="Legal Officer" && $contract_details[status]!="Signed_Off"){ ?>
									<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Legal Officer
												</h3>
											</div>
										</div>
										</div>
								
								
									<div class="m-portlet__body">
								
									<div class="form-group m-form__group row">
										<table class="table m-table">
											<thead>
												<tr>
													<th>
													</th>
													<th>
														
													</th>
													<th>
														
													</th>
													<th>
														
													</th>
													
												</tr>
											</thead>
											<tbody>
												<tr>
													
													<th scope="row" style="background:#e9ecef;">
														Review
													</th>
													<td>
																<label class="m-radio">
																		<input type="radio" name="review" value="1" <?php  if($contract_details[status]!="Pending_Review" && $contract_details[status]!="Fail_Review")echo "checked" ?>>
																		Pass Review
																		<span></span>
																</label>
													</td>
													<td>
																<label class="m-radio">
																		<input type="radio" name="review" value="2" <?php  if($contract_details[status]=="Fail_Review")echo "checked" ?>>
																		Fail Review
																		<span></span>
																</label>
													</td>
													<td>
														<div class="form-group">
															<label for="exampleTextarea">
																Comment
															</label>
															<textarea class="form-control m-input" id="exampleTextarea" rows="3" name="review_comment"></textarea>
														</div>
													</td>
													
												</tr>
												<?php if($contract_details[status]!="Pending_Review" && $contract_details[status]!="Fail_Review"){ ?>
												<tr>
													<th scope="row" style="background:#e9ecef;">
														Validate
													</th>
													<td>
														<label class="m-radio">
																		<input type="radio" name="validate" value="1" <?php  if($contract_details[status]=="Pending_Signoff" || $contract_details[status]=="Fail_Signoff" || $contract_details[status]=="Signed_Off")echo "checked" ?>>
																		Pass Validation
																		<span></span>
														</label>
													</td>
													<td>
														<label class="m-radio">
																		<input type="radio" name="validate" value="2" <?php  if($contract_details[status]=="Fail_Validation")echo "checked" ?>>
																		Fail Validation
																		<span></span>
														</label>
													</td>
													<td>
														<div class="form-group">
															<label for="exampleTextarea">
																Comment
															</label>
															<textarea class="form-control m-input" id="exampleTextarea" rows="3" name="validate_comment"></textarea>
														</div>
													</td>
													
												</tr>
												<?php } ?>
												
												<?php if($contract_details[status]=="Pending_Signoff" || $contract_details[status]=="Fail_Signoff" || $contract_details[status]=="Signed_Off"){ ?>
												<tr>
													<th scope="row" style="background:#e9ecef;">
														Sign off
													</th>
													<td>
														<label class="m-radio">
																		<input type="radio" name="signoff" value="1" <?php  if($contract_details[status]=="Signed_Off") echo "checked" ?>>
																		Pass Sign off
																		<span></span>
														</label>
													</td>
													<td>
														<label class="m-radio">
																		<input type="radio" name="signoff" value="2" <?php  if($contract_details[status]=="Fail_Signoff")echo "checked" ?>>
																		Fail Sign off
																		<span></span>
														</label>
													</td>
													<td>
														<div class="form-group">
															<label for="exampleTextarea">
																Comment
															</label>
															<textarea class="form-control m-input" id="exampleTextarea" rows="3" name="signoff_comment"></textarea>></textarea>
														</div>
													</td>
													
												</tr>
												<?php  } ?>
											</tbody>
										</table>
									</div>
								
									</div>
									<?php } ?>
										
										
										
															<!--<div class="m-radio-list">
																	<label class="m-radio">
																		<input type="radio" name="example_1" value="1">
																		Option 1
																		<span></span>
																	</label>
																	<label class="m-radio">
																		<input type="radio" name="example_1" value="2">
																		Option 2
																		<span></span>
																	</label>
																	<label class="m-radio m-radio--disabled">
																		<input type="radio" disabled>
																		Disabled
																		<span></span>
																	</label>
																	<label class="m-radio">
																		<input type="radio" checked="checked">
																		Checked
																		<span></span>
																	</label>
																</div>-->
								
								<!--<div class="m-portlet__body">
									<div class="form-group m-form__group row">
									<ul class="nav nav-tabs  m-tabs-line m-tabs-line--success" role="tablist">
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
													<i class="la la-cloud-upload"></i>
													Messages
												</a>
											</li>
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
													<i class="la la-cog"></i>
													Settings
												</a>
											</li>
											
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">
													<i class="la la-puzzle-piece"></i>
													Logs
												</a>
											</li>
										</ul>
										<div class="tab-content">
										
											<div class="tab-pane active" id="m_tabs_6_1" role="tabpanel" >
												
												
												<span>content1 goes here</span>
							
											</div>
											
											
											<div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever sin
											</div>
											<div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
											</div>
										</div>
									</div>
								</div>-->
										
										
								<input type="hidden" value="<?php echo $contract_details[status]  ?>" name="status"></input>
										
										
										
										
										
										
										
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-4"></div>
													<div class="col-lg-4">
													<?php if($role=="Legal Officer" &&($contract_details[status]=="Pending_Review" || $contract_details[status]=="Fail_Review" || $contract_details[status]=="Pending_Validation" || $contract_details[status]=="Fail_Validation" || $contract_details[status]=="Pending_Signoff" || $contract_details[status]=="Fail_Signoff")){ ?>
														<button type="submit" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide" >
															Save Changes
														</button>
													<?php } else if($role=="Contract Requester" && ($contract_details[status]=="Fail_Review" || $contract_details[status]=="Fail_Validation" || $contract_details[status]=="Fail_Signoff")) { ?>
														<button type="submit" id="btn-s" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide" style="display:none" >
															Save Changes
														</button>
													<?php } ?>
													
													</div>
													<div class="col-lg-4">
														<div style="font-weight:bold; font-size:17px; 	display:none" id="loader_doc">
														<img src="<?php echo base_url()."assets/img/page-loader.gif" ?>" class="img-responsive" style="width:80px; ">
														PLEASE WAIT .....
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							
							
								
							</div>
						</div>
								
					
					
			
					</div>
					
					
					
			<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/plugins/jquery/jquery.min.js"></script>	

						
<script>
	
	$(function() {
		
	function redirect_view() {
		$('#modal-user').modal('hide');
		window.location.replace('<?php echo site_url('App/contractDetails/'.$contract_details[id]) ?>');
	}
		
	$('#form_contract').submit(function(e) {
		e.preventDefault();
		 $('#loader_doc').css("display","block");
		
            var data = new FormData(this); // <-- 'this' is your form element
            $.ajax({
                url: "<?php echo site_url(); ?>/App/updateContract/<?php echo $contract_details[id] ?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: "POST",
                success: function(response) {
                    if(response.trim()>0)
                    {
                         $('#loader_doc').css("display","none");
						 if(response.trim() == 10 )//no update done
						 {
							$('#doc_error').show().html("No update done");
							window.scroll(0,0);
							setTimeout(function(){
                            $('#doc_error').hide();
							},20000);
						 }
						 else
						 {
							//Display modal for successful update
							$('#modal-user').modal('show');
							setTimeout(function(){redirect_view()},3000);
							
						 }
                     } 
                    else
                    {
						
                         $('#loader_doc').css("display","none");
						$('#doc_error').show().html(response);
						window.scroll(0,0);
                        setTimeout(function(){
                            $('#doc_error').hide();
                        },20000);
                    } 
                }
            });  
			
			
        }); 
		
		
	});

</script>
					
			<script>
			//disables all input fields inside this div--> #disable-fields
			$(document).ready(function(){
					$('#disable-fields :input').attr('disabled', true);
				});
			
				function disableall1(){
				$('#disable-fields :input').removeAttr('disabled');
				$('#btn-s').css("display","block");
				}
			</script>