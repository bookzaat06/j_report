
<?php 
$query = $this->db->query('SELECT b.`name` AS title,GROUP_CONCAT(c.`name`) AS list FROM categories_sub a,categories_group b,categories_list c
WHERE  a.sub_id = b.sub_id AND b.group_id = c.group_id AND a.`name` ="'.urldecode ($sub).'" GROUP BY b.group_id '); 
?>

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
											<?= urldecode($main);?>
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>  
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
											<?=  urldecode($sub);?>
											</span>
										</a>
									</li>
									 
								</ul>
							</div>
							
						</div>
					</div>
					<!-- END: Subheader -->


					
					<div class="m-content">

					<div class="row">
					<?php 
							   $list[]= array();
							   $array1 = array();

							foreach ($query->result_array() as $row)
																	{?>
																	
							<div class="col-xl-6">
								<!--begin:: Widgets/Tasks -->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													<?php  
													echo $row['title'];
													$list = explode(",", $row['list']);   
													?>
												</h3>
											</div>
										</div>
										
									</div>
									<div class="m-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget2_tab1_content">
												<div class="m-widget2"> 
													<?php 
													
													foreach ($list as $key => $item) {
														  
													?>
													<div class="m-widget2__item m-widget2__item--primary">
														<div class="m-widget2__checkbox">
															<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																<input type="checkbox">
																<span></span>
															</label>
														</div>
														<div class="m-widget2__desc">
															<span class="m-widget2__text">
															<?php  echo $item;?>  
															</span>
															<br>
															<span class="m-widget2__user-name">
																<a href="<?=base_url()?>report/<?php echo$sub."/".$row['title']."/".$item;?>" class="m-widget2__link">
																	ดูรายงาน
																</a>
															</span>
														</div>
														<div class="m-widget2__actions">
															<div class="m-widget2__actions-nav">
																<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
																	<a href="#" class="m-dropdown__toggle">
																		<i class="la la-ellipsis-h"></i>
																	</a>
																	<div class="m-dropdown__wrapper">
																		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
																		<div class="m-dropdown__inner">
																			<div class="m-dropdown__body">
																				<div class="m-dropdown__content">
																					<ul class="m-nav">
																						<li class="m-nav__item">
																							<a href="" class="m-nav__link">
																								<i class="m-nav__link-icon flaticon-share"></i>
																								<span class="m-nav__link-text">
																									Activity
																								</span>
																							</a>
																						</li>
																						<li class="m-nav__item">
																							<a href="" class="m-nav__link">
																								<i class="m-nav__link-icon flaticon-chat-1"></i>
																								<span class="m-nav__link-text">
																									Messages
																								</span>
																							</a>
																						</li>
																						<li class="m-nav__item">
																							<a href="" class="m-nav__link">
																								<i class="m-nav__link-icon flaticon-info"></i>
																								<span class="m-nav__link-text">
																									FAQ
																								</span>
																							</a>
																						</li>
																						<li class="m-nav__item">
																							<a href="" class="m-nav__link">
																								<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																								<span class="m-nav__link-text">
																									Support
																								</span>
																							</a>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
													<?php  } ?>
													
												
													
												
												</div>
											</div>
											<div class="tab-pane" id="m_widget2_tab2_content"></div>
											<div class="tab-pane" id="m_widget2_tab3_content"></div>
										</div>
									</div>
								</div>
								<!--end:: Widgets/Tasks -->
							</div>

							<?php    }  ?>
						 
						</div>
						<!--End::Main Portlet-->
					 
						
					</div>
				</div>
			</div>
			<!-- end:: Body -->