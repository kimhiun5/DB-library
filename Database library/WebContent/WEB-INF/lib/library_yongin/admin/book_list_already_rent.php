<?php include 'inc/config.php'; $template['header_link'] = '작업관리'; 
?>
<?php 
include 'inc/template_start.php';
include 'inc/page_head.php';
include 'inc/dbconfig.php';
?>

<?
$sql_page_list = "SELECT * FROM db_rent_detail";
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
                    <h1>도서 목록</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>도서 목록</li>
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
                        <th>대여자</th>
						<th>도서ID</th>
						<th>도서명</th>
						<th>출판사</th>
                        <th>대여일</th>
						<th>반납예정일</th>
					</tr>
                </thead>
                <tbody>
                    <?php while ($rec_page_list = mysqli_fetch_array($result_page_list)) {
					$sql_member_list = "SELECT * FROM db_member WHERE id = $rec_page_list[mb_id]";
					$result_member_list = $conn->query($sql_member_list);
					$rec_member_list = mysqli_fetch_array($result_member_list);
					$sql_book_list = "SELECT * FROM db_books WHERE id = $rec_page_list[book_id]";
					$result_book_list = $conn->query($sql_book_list);
					$rec_book_list = mysqli_fetch_array($result_book_list);

					?>
                    <tr>
                        <td class="text-center"><?php echo $rec_page_list[id]; ?></td>
                        <td><?php echo $rec_member_list[name]; ?></td>
						<td><?php echo $rec_book_list[id]; ?></td>
						<td><?php echo $rec_book_list[name]; ?></td>
						<td><?php echo $rec_book_list[publisher]; ?></td>
                        <td><?php echo $rec_page_list[rent_datetime]; ?></td>
						<td><?php echo $rec_page_list[rent_limit_date]; ?></td>
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