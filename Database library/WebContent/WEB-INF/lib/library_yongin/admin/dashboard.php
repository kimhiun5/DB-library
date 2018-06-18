<?php include 'inc/config.php'; $template['header_link'] = '대시보드'; ?>
<?php 
include 'inc/template_start.php';
include 'inc/page_head.php';
include 'inc/dbconfig.php';
?>
<!-- Page content -->
<div id="page-content">
    <!-- First Row -->
    <div class="row">
        <!-- Simple Stats Widgets -->
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background">
                        <i class="gi gi-cardio text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3">
                        <strong><span data-toggle="counter" data-to="2835"></span></strong>
                    </h2>
                    <span class="text-muted">전채도서수</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-warning">
                        <i class="gi gi-briefcase text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-warning">
                        <strong><span data-toggle="counter" data-to="75"></span></strong>
                    </h2>
                    <span class="text-muted">대여중수</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-danger">
                        <i class="gi gi-wallet text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-danger">
                        <strong><span data-toggle="counter" data-to="5820"></span></strong>
                    </h2>
                    <span class="text-muted">예약수</span>
                </div>
            </a>
        </div>
		<div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-success">
                        <i class="gi gi-user text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-success">
                        <strong><span data-toggle="counter" data-to="2862"></span></strong>
                    </h2>
                    <span class="text-muted">회원수</span>
                </div>
            </a>
        </div>
        <!-- END Simple Stats Widgets -->
    </div>
    <!-- END First Row -->

    <!-- Second Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-8">
			<div class="block">
                <div class="block-title"><h4>공지사항</h4></div>
				<strong>공지사항 내용 강조 테스트</strong>
				<p>
					내용테스트 1
					</br>
					내용테스트 2
					</br>
					내용테스트 3
					</br>
				<p>
            </div>
		</div>
		<div class="col-sm-6 col-lg-4">
			<!-- Partial Responsive Block -->
            <div class="block">
                <!-- Partial Responsive Title -->
                <div class="block-title">
                    <h2>자리현황</h2>
                </div>
                <!-- END Partial Responsive Title -->

                <!-- Partial Responsive Content -->
				<?
				$sql_server_status = "SELECT * FROM db_room_detail";
				$result_server_status = $conn->query($sql_server_status);
				?>
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                        <tr>
                            <th>도서관명</th>
                            <th>빈자리현황</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php while ($rec_server_status = mysqli_fetch_array($result_server_status)) { ?>
                        <tr>
                            <td><strong><?php echo $rec_server_status[room_name]; ?></strong></td>
                            <td>
								<a href='javascript:void(0)' class='label label-success'>
								<?php 
									$total_count = (int)$rec_server_status[total_num];
									$use_count = (int)$rec_server_status[use_num];
									echo $total_count-$use_count." 자리";
								?>
								</a>
							</td>
                        </tr>
						<?php } ?>
					</tbody>
                </table>
                <!-- END Partial Responsive Content -->
            </div>
            <!-- END Partial Responsive Block -->
        </div>
	</div>
    <!-- END Second Row -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyDashboard.js"></script>
<script>$(function(){ ReadyDashboard.init(); });</script>

<?php include 'inc/template_end.php'; ?>