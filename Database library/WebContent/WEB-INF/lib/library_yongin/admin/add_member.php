<?php include 'inc/config.php'; $template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>회원등록</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>회원등록</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Validation Header -->

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>회원등록 - 정보입력</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-name">이름 <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-name" name="val-name" class="form-control" placeholder="이름을 입력해 주세요">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-email">이메일 <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-email" name="val-email" class="form-control" placeholder="이메일을 입력해 주세요">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-password">비밀번호 <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" id="val-password" name="val-password" class="form-control" placeholder="비밀번호를 입력해 주세요">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-confirm-password">비밀번호 확인 <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" id="val-confirm-password" name="val-confirm-password" class="form-control" placeholder="비밀번호를 다시 입력해 주세요">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-birthday">생년월일 <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-birthday" name="val-birthday" class="form-control" placeholder="2018-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-phone">연락처 <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-phone" name="val-phone" class="form-control" placeholder="01012341234">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">회원등록</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">다시작성</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->
            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
    <!-- END Form Validation Content -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<?php include 'inc/template_end.php'; ?>