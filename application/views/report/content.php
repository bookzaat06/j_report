<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
                                
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?=base_url();?>dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
 										</a>
									</li> 
									<li class="m-nav__separator">
										-
									</li>  
									<li class="m-nav__item">
 											<span class="m-nav__link-text">
											<?= $this->mainactive;?>
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>  
									<li class="m-nav__item">
										<a href="<?=base_url();?>category/<?=$this->mainactive.'/'.$this->subactive;?>" class="m-nav__link">
											<span class="m-nav__link-text">
											<?= $this->subactive;?>
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>  
									<li class="m-nav__item">
 											<span class="m-nav__link-text">
											<?= $this->reportgroup;?>
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
											<?= $this->reportname;?>
											</span>
										</a>
									</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
					 
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
										<?php echo  'รายงาน '.$this->reportname ;?>
											<small>
												initialized from javascript array
											</small>
										</h3>
									</div>
								</div>
								
							</div>
							<div class="m-portlet__body">
								<!--begin: Search Form -->
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">
										<div class="col-xl-8 order-2 order-xl-1">
											<div class="form-group m-form__group row align-items-center">
												<div class="col-md-4">
													<div class="m-form__group m-form__group--inline">
														<div class="m-form__label">
															<label>
																Status:
															</label>
														</div>
														<div class="m-form__control">
															<select class="form-control m-bootstrap-select m-bootstrap-select--solid" id="m_form_status">
																<option value="">
																	All
																</option>
																<option value="1">
																	Pending
																</option>
																<option value="2">
																	Delivered
																</option>
																<option value="3">
																	Canceled
																</option>
															</select>
														</div>
													</div>
													<div class="d-md-none m--margin-bottom-10"></div>
												</div>
												<div class="col-md-4">
													<div class="m-form__group m-form__group--inline">
														<div class="m-form__label">
															<label class="m-label m-label--single">
																Type:
															</label>
														</div>
														<div class="m-form__control">
															<select class="form-control m-bootstrap-select m-bootstrap-select--solid" id="m_form_type">
																<option value="">
																	All
																</option>
																<option value="1">
																	Online
																</option>
																<option value="2">
																	Retail
																</option>
																<option value="3">
																	Direct
																</option>
															</select>
														</div>
													</div>
													<div class="d-md-none m--margin-bottom-10"></div>
												</div>
												<div class="col-md-4">
													<div class="m-input-icon m-input-icon--left">
														<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
														<span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-cart-plus"></i>
													<span>
														New Order
													</span>
												</span>
											</a>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
		<!--begin: Datatable -->
								<div class="m_datatable" id="local_data"></div>
								<!--end: Datatable -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->