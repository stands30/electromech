<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
        
        <?php $this->load->view('common/header_styles'); ?>
        <!-- Page Level style -->
         <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <!-- Page Level style -->
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php $this->load->view('common/header'); ?> 
       
        <div class="clearfix"> </div>
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
                        <div class="portlet light bordered">
                           <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                                    <div id="btn-box" class="btn-group">
                                      <?php if($add_access) { ?>
                                        <a id="sample_editable_1_new" href="<?php echo base_url('invoice-add'); ?>" class="btn green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>
                                      <?php } ?>
                                   </div>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-list table-hover table-quot" id="invoice_list">
                                    <thead>
                                        <tr>
                                            <th><i class="fas fa-th-list list-level"></i> Title</th>                                                
                                            <th><i class="fas fa-user list-level"></i>Customer Name </th>
                                            <th><i class="fas fa-list-ol list-level"></i>Code</th>
                                            <th><i class="fas fa-calendar-alt list-level"></i> Date</th>
                                            <th><i class="far fa-money-bill-alt icon-lead"></i> Amount </th>
                                            <th><i class="fas fa-info-circle list-level"></i> Status </th>
                                            <!-- <th><i class="fas fa-calendar-alt list-level"></i> Due Date</th> -->
                                            <th><i class="fas fa-calendar-alt list-level"></i> Created On </th>
                                            <th><i class="fas fa-info-circle list-level"></i>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <!-- -----MAIN CONTENTS END HERE----- -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?> 
             <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script> 
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
            <script type="text/javascript">
                      $(document).ready(function(){
                        getInvoiceList();
                    });
                    function getInvoiceList()
                    {
                        var customDataTableElement = '#invoice_list';
                        var led_id = <?php echo isset($led_id) ? $led_id:'""' ?>;
                        $(customDataTableElement).DataTable().destroy();
                        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                        var customDataTableUrl     = baseUrl + 'invoice/invoiceDataTablelist?table_data_count='+customDataTableCount+'&lead='+led_id;
                        var customDataTableColumns = [
                            {   'data'  : 'inv_title' ,
                                'render': function(data, type, row, meta)
                                {
                                    var link = ''+row.inv_title+'';
                                    
                                    <?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'invoice-details-'+row.inv_encrypted_id+'" title="View Detail">'+row.inv_title+'</a>&nbsp;';
                                         return link;
                                    <?php }else{ ?>
                                        link = row.inv_title;
                                    <?php }?>
                                      return link;

                                      
                                }
                            },
                            {   'data'  : 'inv_company',
                                'render': function(data, type, row, meta)
                                {
                                    var link = row.inv_cmp_encrypted_id;
                                   /* if(row.private_access == 0)
                                      return link;*/
                                    
                                    /*<?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'people-details-'+row.ppl_encrypted_id+'" title="View Detail">'+row.inv_led_id+'</a>&nbsp;';
                                    <?php }?>*/
                                      link = '<a href="'+baseUrl+'company-details-'+row.inv_cmp_encrypted_id+'" title="View Detail">'+row.inv_company+'</a>&nbsp;';
                                  return link;
                                }
                            },
                            {   'data'  : 'inv_code' },
                            {   'data'  : 'inv_date_format' },
                            {   'data'  : 'inv_total' ,
                                 'render': function(data, type, row, meta)
                                {
                                  return link = ''+row.inv_total;
                                }
                            },
                            {   'data'  : 'inv_apprvl_status_name' },
                            // {   'data'  : 'inv_due_date_format' },
                            {   'data'  : 'inv_crdt_dt_format' },
                            {   'data'  : 'inv_led_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                                  <?php if($edit_access) { ?>
                                     link += '<a href="'+baseUrl+'invoice-edit-'+row.inv_encrypted_id+'" title="Edit Details "><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }?>
                                  <?php if($delete_access) { ?>
                                    link += '<a href="javascript:;" title="Delete Invoice" data-toggle="tooltip" data-inv_id='+row.inv_id+' data-inv_code='+row.inv_code+' onclick=deleteInvoice(this)><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }
                                  if($print_access) {?>
                                    link += '<a href="'+baseUrl+'invoice-print-'+row.inv_encrypted_id+'" title="Print Invoice" data-toggle="tooltip"><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-print" aria-hidden="true"></i></a>&nbsp;';
                                 <?php } ?>
                                  return link;
                                }
                            }
                        ];
                        customDatatablex({
                          element: customDataTableElement, 
                          url: customDataTableUrl, 
                          columns: customDataTableColumns, 
                          buttons : true, 
                          serverSide : customDataTableServer,
                          delay : 1000,
                          optParam : {
                           <?php 
                              if($export_access)
                                echo 'exportAccess : true,';
                              if($print_access)
                                echo 'printAccess : true,';
                            ?>
                          }
                        });
                        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                    }
                    function deleteinvoice(thisElement)
                 {
                   var inv_id = $(thisElement).attr('data-inv_id');
                   var inv_code = $(thisElement).attr('data-inv_code');
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Invoice : "+inv_code,
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                            },
                            function(isConfirm) {
                              if (isConfirm) 
                              {
                                   dataString =
                                  {
                                      inv_id:inv_id,
                                      inv_code:inv_code+'-deleted',
                                      inv_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'invoice/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message="Invoice Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                  getInvoiceList();
                                              }
                                              else
                                              {
                                                  $('.btn_save').button('reset');
                                                  swal(
                                                  {
                                                      title: "Opps",
                                                      text: "Something Went wrong",
                                                      type: "error",
                                                      icon: "error",
                                                      button: true,
                                                  });
                                              }
                                          }
                                      });
                              }else {
                                swal("Cancelled", "Invoice is safe :)", "error");
                              }
                          });

                 }
                  
        
                </script>
        </div>
    </body>
</html>