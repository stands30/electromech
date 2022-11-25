<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <title>
    <?php echo $title.' | '.TITLE_POSTFIX; ?>
  </title>
  <head>
    
    <?php $this->load->view('common/header_styles'); ?> 
      

      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

     <link href="<?php echo base_url(); ?>assets/module/cashbook/css/cashbook-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?> 
    <div class="clearfix"> 
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
      <?php $this->load->view('common/sidebar'); ?> 
      <!-- BEGIN CONTENT -->
      <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add New Expense
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="expense_add">

                  <input type="hidden" name="csb_type" id="csb_type" value="<?php echo CASHBOOK_EXPENSE ?>">
                  <input type="hidden" name="csb_transaction_type" id="csb_transaction_type" value="<?php echo CASHBOOK_USER ?>">

                  <div class="row">
                    <div class="form-group  form-md-line-input form-md-floating-label  col-md-6 ">
                      <div class="input-icon">
                      <input type="text" name="csb_date " id="csb_date " value="" class="form-control da color-primary-light  date date-picker">
                      <label for="csb_date">Date
                        <span class="asterix-error">
                          <em>*
                          </em>
                        </span>
                      </label>
                      <i class="fas fa-calendar-alt"></i>
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="hidden" name="csb_approve" id="csb_approve" value="<?php echo CASHBOOK_PENDING ?>" class="form-control  color-primary-light">
                        <input type="text" disabled name="csb_approve_name" id="csb_approve_name" value="PENDING" class="form-control color-primary-light">
                        <label for="csb_approve">Approval Status</span>
                        <span class="asterix-error">
                            <em>*
                            </em></label>
                        <i class="fas fa-id-card"></i>
                      </div>
                    </div>
                  </div>

                    <div class="row">
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="csb_particular" id="csb_particular" value="" class="form-control  color-primary-light" required>
                            <label for="csb_particular">Particular</span>
                            <span class="asterix-error">
                            <em>*
                            </em>
                          </span></label>
                          <i class="fas fa-th-list list-level"></i>
                          </div>
                        </div>
                        <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                             <input type="number" name="csb_amount" id="csb_amount" value="" class="form-control color-primary-light" required>
                             <i class="fas fa-rupee-sign"></i>
                             <label>Amount
                             <span class="asterix-error">
                            <em>*
                            </em>
                            </span></label>
                            <div class="help-block"></div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                           <label class="drp-title">Category</label> 
                          <div class="input-icon">
                             <i class="fas fa-th-list"></i>
                            <select name="csb_cbc_id" id="csb_cbc_id" class="form-control category-select2 custom-select2" onchange="getSubCategoryDetails(this.value);" required autocomplete="off">
                              <option></option>
                           </select>
                            <label class="custom-label">Please Select Category</label> 
                          </div>
                        </div>                       
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Sub Category</label> 
                          <div class="input-icon">
                            <i class="fas fa-th-list"></i>
                           <select name="csb_csc_id" id="csb_csc_id" class="form-control sub-category-select2 custom-select2" autocomplete="off">
                            <option></option>
                            </select>
                            <label for="csb_csc_id" class="custom_select2_label custom-label">Select Sub Category</label>
                        </div>                          
                      </div>
                    </div></div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Person</label> 
                          <div class="input-icon">   
                          <i class="fa fa-user"></i>                          
                             <select name="csb_ppl_id" id="csb_ppl_id" class="form-control people-select2 custom-select2" required autocomplete="off">
                              <option></option></select>
                              <label class="custom-label">Please Select Person</label> 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Account</label> 
                          <div class="input-icon">
                            <i class="fas fa-clipboard "></i>
                             <select name="csb_acc_id" id="csb_acc_id" class="form-control account-select2 custom-select2" required autocomplete="off">
                            <option value="<?php echo $account['acc_id'] ?>" selected="selected"> <?php echo $account['acc_name'] ?> </option>
                            </select>
                            <label class="custom-label">Please Select Account</label> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea id="csb_remark" name="csb_remark" class="form-control color-primary-light" rows="2"></textarea>
                            <i class="fa fa-comments list-level"></i>
                            <label>Remark </label>
                        </div>
                      </div>
                    </div>
                  </div>   
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save &nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel &nbsp;
                    <i class="fa fa-times">
                    </i>
                  </button>
                </div>
              </footer>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
        
        <!-- END PAGE LEVEL PLUGINS -->

         <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
          <!-- BEGIN PAGE LEVEL PLUGINS -->
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <!--  <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
         <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
          <!-- END PAGE LEVEL PLUGINS -->
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      
        <script src="<?php echo base_url(); ?>assets/module/cashbook/js/cashbook-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/cashbook/expense/validation/user-expense.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>

       <script type="text/javascript">
        $('.date-picker').datepicker({
          autoClose:true,
           }).on('changeDate', function(e){
              $(this).addClass('edited');
              $(this).datepicker("hide");
        });
      </script>

  </body>
</html>
