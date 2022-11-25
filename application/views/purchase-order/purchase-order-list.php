<!DOCTYPE html>
  <html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
    <?php $this->load->view('common/header_styles');?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
            <!-- END PAGE BAR -->
              <!-- END PAGE HEADER-->
                <!-- END PAGE HEADER-->
                <!-- -----MAIN CONTENTS START HERE----- -->
            <div class="portlet light bordered">
              <div class="portlet-title">
                  <div class="caption font-dark">
                      <!-- <i class="icon-settings font-dark"></i> -->
                      <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                      <div class="btn-group">
                        <?php if ($add_access) { ?>
                      <a id="sample_editable_1_new" href="<?php echo base_url('purchase-order-add'); ?>" class="btn green"> Add Purchase Order<i class="fa fa-plus"></i></a>
                    <?php } ?>
                      </div>
                      
                  </div>
                  <div class="tools"> </div>
              </div>
              <div class="portlet-body">
                <ul class="nav nav-tabs">
                   <?php $i=0;
                    foreach ($por_status_group as $por_status_group_key ) {
                    $active_status='';
                    if($i == 0)
                    {
                      $active_status='active';
                    } 
                    $i++; ?>
                    <li class="custom-tab-header <?php echo $active_status; ?>">
                      <a href="#por_status_tab_<?php echo $por_status_group_key->f1; ?>" data-toggle="tab" ><?php echo $por_status_group_key->f2; ?> <span id="por_status_count_<?php echo $por_status_group_key->f1; ?>" class="countBtn"></span></a>
                    </li>
                  <?php } ?>    
                  
                </ul>
                <div class="tab-content">
                   <?php 
                  $selected=0;
                  foreach ($por_status_group as $por_status_group_key ) 
                  { 
                    $selected_active_status ='';
                    if($selected == 0)
                    {
                      $selected_active_status='active';
                    }
                  ?>
                    <div class="tab-pane <?php echo $selected_active_status; ?>" id="por_status_tab_<?php echo $por_status_group_key->f1; ?>">
                      <div class="portlet">
                        <div class="portlet-title">
                          <!-- <span class="active_lead_count"><b>Total: </b><span id="active_lead_count_total_<?php echo $por_status_group_key->f1; ?>">0</span></span>
                          <span class="active_lead_count"><b>On Hold: </b><span id="active_lead_count_onhold_<?php echo $por_status_group_key->f1; ?>">0</span></span> -->
                        
                        </div>
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-quot table-list " id="por_status_table_<?php echo $por_status_group_key->f1; ?>">
                              <thead>
                                <tr>
                                  <th><i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>Purchase Order No</th>           
                                  <th><i class="fas fa-handshake icon-client list-level"></i> Vendor</th>
                                  <th><i class="far fa-calendar-alt list-level"></i> Date</th>
                                  <th><i class="fas fa-id-card list-level"></i> Reference No</th>
                                  <!-- <th><i class="fas fa-info-circle list-level"></i> Status</th> -->
                                  <th><i class="fas fa-cog list-level"></i> Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                         </div>
                      </div>
                    <?php $selected++;  } ?>

                </div>

               


                  
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
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
          <!-- OPTIONAL SCRIPTS -->
          <!-- END OPTIONAL SCRIPTS -->
           <script type="text/javascript">
                      $(document).ready(function(){
                        getCustomList();
                    });
       

                    function getCustomList()
                    {
                       var tableNameArr = <?php  echo json_encode($por_status_group); ?>;

                        for(var i = 0; i < tableNameArr.length; i++)
                        {
                            var customDataTableElement = '#por_status_table_'+tableNameArr[i].f1;
                            $(customDataTableElement).DataTable().destroy();
                            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                            var customDataTableUrl     = baseUrl + 'purchase-order-getlist?table_data_count='+customDataTableCount+'&por_received_status='+tableNameArr[i].f1;
                            var customDataTableColumns = [
                                {   'data'  : 'por_code' ,
                                    'render' : function(data,type,row,meta)
                                    {
                                      var link = row.por_code;
                                      <?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'purchase-order-details-'+row.por_encrypted_id+'"  title="View Purchase Order Details" data-toggle="tooltip" >'+row.por_code+'</a>&nbsp;';
                                      <?php } ?>
                                      return link;
                                    }
                                },
                                {   'data'  : 'por_company',
                                    'render': function(data, type, row, meta)
                                    {
                                        var link = row.por_vendor;
                                          link = '<a href="'+baseUrl+'company-details-'+row.por_vdr_encrypted_id+'" title="View Detail">'+row.por_vendor+'</a>&nbsp;';
                                      return link;
                                    }
                                },
                                {   'data'  : 'por_date_format' },
                                {   'data'  : 'por_reference'  },
                                {   'data'  : 'por_id' ,
                                    'render': function(data, type, row, meta)
                                    {
                                      var link = '';
                                      if(row.private_access == 0)
                                        return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                                      <?php if($edit_access) { ?>
                                        if (row.por_received_status!= '<?php echo PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED ?>') {

                                         link += '<a href="'+baseUrl+'purchase-order-edit-'+row.por_encrypted_id+'" title="Edit Details "><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
                                       }
                                      <?php }?>
                                      <?php if($delete_access) { ?>
                                        link += '<a href="javascript:;" title="Delete Purchase Order" data-toggle="tooltip"  data-module_id='+row.por_id+' data-module_code='+row.por_code+' data-total_stock='+row.total_stock+' onclick=deleteModule(this)><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                      <?php }
                                      if($print_access) {?>
                                        link += '<a href="'+baseUrl+'purchase-order-print-'+row.por_encrypted_id+'" title="Print Purchase Order" data-toggle="tooltip"><i  class="fa fa-print" aria-hidden="true"></i></a>&nbsp;';
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
                          getTablCount('#por_status_table_'+tableNameArr[i].f1,'#por_status_count_'+tableNameArr[i].f1);
                        }
                        
                    }
                    function getTablCount(tableName, countElement) {
                  $(tableName).on('draw.dt', function() {
                    var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
                    /*console.log($(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5]);
                    console.log(count);
                    console.log(countElement);*/
                    console.log(countElement);
                    $(countElement).html('' + (count ? count : 0) + '');
                  });
                }
                  function deleteModule(thisElement)
                 {
                   var module_id   = $(thisElement).attr('data-module_id');
                   var module_code = $(thisElement).attr('data-module_code');
                   var total_stock = $(thisElement).attr('data-total_stock');
                   if(total_stock > 0)
                   {
                       swal(
                          {
                              title: "Opps",
                              text: "Please delete Inventory First ",
                              type: "error",
                              icon: "error",
                              button: true,
                          });
                      return false;
                   }
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Purchase Order : "+module_code,
                          type: "warning",
                          buttons: true,
                          dangerMode: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                            }).then((isConfirm) => {
                              if (isConfirm) 
                              {
                                   dataString =
                                  {
                                      por_id:module_id,
                                      por_code:module_code+'-deleted',
                                      por_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'purchaseOrder/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message="Purchase Order Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                  getCustomList();
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
                                swal("Cancelled", "Purchase Order is safe :)", "error");
                              }
                          });

                 }
                  
        
                </script>
        </div>
    </body>
  </html>
