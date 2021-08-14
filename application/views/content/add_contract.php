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
												<b>Contract successfully added and pending review by legal officer</b>
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
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_contract" enctype="multipart/form-data" accept-charset="utf-8" method="post">
									
									
									
									
									
									
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Title:
													</label>
													<select name="requester_title" class="form-control m-input" required>
														<option value="">-select-</option>
														<option value="Miss">Miss</option>
														<option value="Mrs">Mrs</option>
														<option value="Mr">Mr</option>
														
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
														<input type="text" name="requester_name" class="form-control m-input" placeholder="" value="<?php echo $this->session->userdata('name'); ?>" readonly required>
													</div>
													<span class="m-form__help">
														Please enter your fullname
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Department:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter department" name="requester_dept" required>
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
													<select name="other_party_title" class="form-control m-input" required>
														<option value="">-select-</option>
														<option value="Miss">Miss</option>
														<option value="Mrs">Mrs</option>
														<option value="Mr">Mr</option>
														
													</select>
													<span class="m-form__help">
														Please select your title
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Name:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_name" required>
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
														<input type="text" class="form-control m-input" placeholder="enter service location" name="service_location" required>
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
															<input type="radio" name="authorized_signatory" value="1">
															Signed
															<span></span>
														</label>
														<label class="m-radio m-radio--solid">
															<input type="radio" name="authorized_signatory" value="2">
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
													<input type="number" class="form-control m-input" placeholder="Enter phone number" name="phone_no" required>
													<span class="m-form__help">
														Please enter phone number
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Email:
													</label>
													<input type="email" class="form-control m-input" placeholder="Enter email" name="email" required>
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
														<input type="text" class="form-control m-input" placeholder="" name="address" required>
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
														Contract Duration:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter contract duration" name="contract_duration" required>
													<span class="m-form__help">
														Please enter contract duration
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Proposed Start Date:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter start date" name="proposed_start_date" id="m_datepicker_1" data-date-format="yyyy/mm/dd" readonly required>
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
														<input type="text" class="form-control m-input" placeholder="" name="proposed_end_date" id="m_datepicker_2" data-date-format="yyyy/mm/dd" readonly required>
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
													<input type="file" class="form-control m-input" placeholder="Enter contact number" name="doc_"  required>
													<span class="m-form__help">
														Attach proposal agreed upon or Sales/Service Order
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
													<input type="text" class="form-control m-input" placeholder="Enter termination notice" name="termination_notice" required>
													<span class="m-form__help">
														Please enter termination notice
													</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Payment Term:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter payment term" name="payment_term" required>
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
														<input type="text" class="form-control m-input" placeholder="enter Lease or sale of equipment" name="sale_of_equipment" required>
													</div>
													<span class="m-form__help">
														Please enter Lease or sale of equipment
													</span>
												</div>
											</div>
											
											
										</div>
										
										
										
										
										
										
										
										
										
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-4"></div>
													<div class="col-lg-4">
														<button type="submit" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide">
															Submit
														</button>
														<button type="reset" class="btn m-btn--pill m-btn--air         btn-secondary m-btn--wide">
															Cancel
														</button>
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
								
								
								
<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/plugins/jquery/jquery.min.js"></script>
						
<script>
	
	$(function() {
		
	function redirect_view() {
		$('#modal-user').modal('hide');
		window.location.replace('<?php echo site_url('App/contracts/pr') ?>');
	}
		
	$('#form_contract').submit(function(e) {
		e.preventDefault();
		 $('#loader_doc').css("display","block");
		
            var data = new FormData(this); // <-- 'this' is your form element
            $.ajax({
                url: "<?php echo site_url(); ?>/App/insertContract",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: "POST",
                success: function(response) {
                    if(response.trim()>0)
                    {
                         $('#loader_doc').css("display","none");
						 //Display modal for successful user creation
						 $('#modal-user').modal('show');
						 setTimeout(function(){redirect_view()},3000);
						 $("#form_contract").trigger('reset');
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
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
						
						
						
						
						
						
						
												
						
						
						
						
						
						
						
						
						
						
						
			
						
						
	</div>