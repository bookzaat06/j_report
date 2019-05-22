<?php
$query = $this->db->query('SELECT categories.*,GROUP_CONCAT(categories_sub.sub_id) AS sub_id,GROUP_CONCAT(categories_sub.`name`) AS name_sub  FROM categories
INNER JOIN categories_sub ON categories.main_id = categories_sub.main_id GROUP BY categories.main_id');

$query_menu = $this->db->query('SELECT a.`name` AS main	,b.`name` AS sub,c.`name` AS title,d.`name`AS list FROM   categories a,categories_sub b,categories_group c,categories_list d
WHERE  a.main_id = b.main_id AND b.sub_id = c.sub_id AND c.group_id = d.group_id AND b.`name`="' . urldecode($main) . '" AND c.`name`="' . urldecode($group) . '" AND d.`name`="' . urldecode($list) . '" GROUP BY c.group_id');

foreach ($query_menu->result_array() as $row) {
	$this->mainactive = $row['main'];
	$this->subactive = $row['sub'];
	$this->reportgroup = $row['title'];
	$this->reportname = $row['list'];
}


?>

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
		<i class="la la-close"></i>
	</button>
	<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
		<!-- BEGIN: Aside Menu -->
		<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
				<li class="m-menu__item " aria-haspopup="true">
					<a href="<?php echo base_url(); ?>dashboard" class="m-menu__link ">
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


				foreach ($query->result_array() as $row) {
					?>
					<li class="m-menu__item  m-menu__item--submenu <?php if ($this->mainactive == $row['name']) echo 'm-menu__item--open m-menu__item--expanded'; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
						<a href="#" class="m-menu__link m-menu__toggle">
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
								<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
									<a href="#" class="m-menu__link ">
										<span class="m-menu__link-text">
											Base
										</span>
									</a>
								</li>

								<?php
								foreach ($submenu as $key => $value) {
									?>
									<!-- <div class="m-menu__submenu">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav"> -->
									<li class="m-menu__item <?php if ($this->subactive == $value) echo 'm-menu__item--active'; ?>" aria-haspopup="true" >
										<a href="<?php echo base_url(); ?>category/<?= $row['name'] . '/' . $value; ?>" class="m-menu__link m-menu__toggle">
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






				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						Snippets
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" data-menu-submenu-toggle="hover">
					<a href="#" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-interface-3"></i>
						<span class="m-menu__link-text">
							General
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
								<a href="#" class="m-menu__link ">
									<span class="m-menu__link-text">
										General
									</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
								<a href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Pricing Tables
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true">
											<a href="<?php echo base_url(); ?>snippets/general/pricing-tables/pricing-table-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pricing Tables v1
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="<?php echo base_url(); ?>snippets/general/pricing-tables/pricing-table-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pricing Tables v2
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="<?php echo base_url(); ?>snippets/general/pricing-tables/pricing-table-3.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pricing Tables v3
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
					<a href="#" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-suitcase"></i>
						<span class="m-menu__link-text">
							Custom Pages
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
								<a href="#" class="m-menu__link ">
									<span class="m-menu__link-text">
										Custom Pages
									</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
								<a href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										User Pages
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/user/login-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Login - 1
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/user/login-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Login - 2
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/user/login-3.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Login - 3
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/user/login-4.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Login - 4
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/user/login-5.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Login - 5
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
								<a href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Error Pages
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/errors/error-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error 1
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/errors/error-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error 2
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/errors/error-3.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error 3
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/errors/error-4.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error 4
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/errors/error-5.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error 5
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a target="_blank" href="<?php echo base_url(); ?>snippets/pages/errors/error-6.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error 6
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<!-- END: Aside Menu -->
	</div>
	<!-- END: Left Aside -->