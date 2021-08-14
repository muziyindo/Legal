					<div class="m-content">
					
						<div class="row">
							<div class="col-lg-12">
							
							
							
							
							
							
							
						<!--begin::Portlet-->
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Contracts Pending Review
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								<!--begin::Section-->
								<div class="m-section">
									<div class="m-section__content">
										<table class="table table-bordered table-striped <!--m-table m-table--border-brand m-table--head-bg-brand-->">
											<thead>
												<tr>
													<th>
														#
													</th>
													<th>
														Requester
													</th>
													<th>
														Other Party
													</th>
													<th>
														Duration
													</th>
													<th>
														Start Date
													</th>
													<th>
														End Date
													</th>
													<th>
														Termination Notice
													</th>
													<th>
														Status
													</th>
													<th>
													
													</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach($contracts as $contract) { ?>
												<tr>
													<th scope="row">
														<?php echo $i; ?>
													</th>
													<td>
														<?php echo $contract->requester_name; ?>
													</td>
													<td>
														<?php echo $contract->other_party_name; ?>
													</td>
													<td>
														<?php echo $contract->contract_duration; ?>
													</td>
													<td>
														<?php echo $contract->proposed_start_date; ?>
													</td>
													<td>
														<?php echo $contract->proposed_end_date; ?>
													</td>
													<td>
														<?php echo $contract->termination_notice; ?>
													</td>
													<td>
														<?php echo $contract->status; ?>
													</td>
													<td>
														<a href="<?php echo site_url('App/contractDetails/'.$contract->id)  ?>" class="btn btn-accent m-btn m-btn--icon m-btn--pill m-btn--air">
															<span>
																<i class="la la-eye"></i>
																<span>
																	More
																</span>
															</span>
														</a>
													</td>
												</tr>
												<?php $i++; } ?>
												
												
											</tbody>
										</table>
									</div>
								</div>
								<!--end::Section-->
								
								
								
								
								
								
			
								
							</div>
							<!--end::Form-->
						</div>
						<!--end::Portlet-->
							
							
								
							</div>
						</div>
								
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
						
						
						
						
						
						
						
												
						
						
						
						
						
						
						
						
						
						
						
			
						
						
					</div>