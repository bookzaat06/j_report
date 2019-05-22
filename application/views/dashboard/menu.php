<?php 
$query = $this->db->query('SELECT categories.*,GROUP_CONCAT(categories_sub.sub_id) AS sub_id,GROUP_CONCAT(categories_sub.`name`) AS name_sub  FROM categories
INNER JOIN categories_sub ON categories.main_id = categories_sub.main_id GROUP BY categories.main_id');


?>
    
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="<?php echo base_url(); ?>dashboard" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Components
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							
						
							<?php 
										 foreach ($query->result_array() as $row)
										 {
											 ?>
											<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-3"></i>
									<span class="m-menu__link-text">
											 <?php 
												 echo $row['name'];  
												 $submenuid = explode(",", $row['sub_id']); 
												 $submenu = explode(",", $row['name_sub']); 
 													?>  
										
												
										</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								
							<?php
							foreach ($submenu as $key => $value) {
								?>

								
									<li class="m-menu__item" aria-haspopup="true">
										<a href="category/<?= $row['name'] . '/' . $value; ?>" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												<?php echo "[" . $submenuid[$key] . "]" . $value; ?>
											</span>
										</a>
									</li>

								<?php
							} ?>
							</ul>
						</div>

					</li>
				<?php
			}
			?>

							 
							 
							
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->		