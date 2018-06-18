<?php include 'inc/config.php'; $template['header_link'] = '작업관리'; 
?>
<?php 
include 'inc/template_start.php';
include 'inc/page_head.php';
include 'inc/dbconfig.php';
?>

<?
$sql_page_list = "SELECT * FROM db_books";
//$sql_page_list = "SELECT id, url, count, click, start_count, daily_limit, status, comment, date FROM f1_url_data_phone";
$result_page_list = $conn->query($sql_page_list);
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>
<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>도서 목록 - 전채</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>전채 도서 목록</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    
	<!-- Datatables Block -->
    <!-- Datatables is initialized in js/pages/uiTables.js -->
    <div class="block full">
        <div class="block-title">
            <h2>도서 목록</h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>종류</th>
						<th>분류</th>
                        <th>도서명</th>
						<th>저자</th>
						<th>출판사</th>
                        <th>ISBN</th>
						<th>대여기간</th>
						<th>재고</th>
						<th>등록일시</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rec_page_list = mysqli_fetch_array($result_page_list)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $rec_page_list[id]; ?></td>
                        <td>
						<?php
						if ($rec_page_list[type] == "DVD") {
							echo "DVD";
						} else {
							echo "도서";
						}
						?>
						</td>
                        <td><?php echo $rec_page_list['class']; ?></td>
                        <td><?php echo $rec_page_list[name]; ?></td>
						<td><?php echo $rec_page_list[author]; ?></td>
						<td><?php echo $rec_page_list[publisher]; ?></td>
						<td><?php echo $rec_page_list[isbn]; ?></td>
						<td><?php echo $rec_page_list[rent_date]."일"; ?></td>
                        <td><?php echo (int)$rec_page_list[stock_count] - (int)$rec_page_list[rent_count]."권"; ?></td>
						<td><?php echo $rec_page_list[reg_date]; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->


<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>