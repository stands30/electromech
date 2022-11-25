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
                      <a id="sample_editable_1_new" href="<?php echo base_url('order-add'); ?>" class="btn green"> Add Order <i class="fa fa-plus"></i> </a>
                      </div>
                  </div>
                  <div class="tools"> </div>
              </div>
              <div class="portlet-body">
                <ul class="nav nav-tabs">
                  <?php $i=0;
                    foreach ($ord_status_group as $ord_status_group_key ) {
                    $active_status='';
                    if($i == 0)
                    {
                      $active_status='active';
                    } 
                    $i++; ?>
                    <li class="custom-tab-header <?php echo $active_status; ?>">
                      <a href="#ord_status_tab_<?php echo $ord_status_group_key->f1; ?>" data-toggle="tab" ><?php echo $ord_status_group_key->f2; ?> <span id="ord_status_count_<?php echo $ord_status_group_key->f1; ?>" class="countBtn"></span></a>
                    </li>
                  <?php } ?>
                </ul>
                <div class="tab-content">
                  <?php 
                  $selected=0;
                  foreach ($ord_status_group as $ord_status_group_key ) 
                  { 
                    $selected_active_status ='';
                    if($selected == 0)
                    {
                      $selected_active_status='active';
                    }
                  ?>
                    <div class="tab-pane <?php echo $selected_active_status; ?>" id="ord_status_tab_<?php echo $ord_status_group_key->f1; ?>">
                    <div class="portlet">
                    <div class="portlet-title">
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-quot table-list " id="ord_status_table_<?php echo $ord_status_group_key->f1; ?>">
                        <thead>
                            <tr>
                              <th><i class="fas fa-th-list list-level"></i>Title</th>
                              <th><i class="fas fa-handshake icon-client list-level"></i> Client</th>
                              <th><i class="fas fa-boxes list-level"></i>Order No</th>           
                              <th><i class="far fa-calendar-alt list-level"></i> Date</th>
                              <th><i class="fas fa-id-card list-level"></i> Reference No</th>
                              <th><i class="fas fa-file-medical list-level"></i>Order Type</th>
                              <th><i class="fas fa-layer-group list-level"></i>Order Category</th>
                              <!-- <th><i class="fas fa-cart-plus list-level"></i>Order Status</th> -->
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
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <!-- OPTIONAL SCRIPTS -->
          <!-- END OPTIONAL SCRIPTS -->
           <script type="text/javascript">
                      $(document).ready(function(){
                        getCustomList();
                    });
       

                    function getCustomList()
                    {
                       var tableNameArr = <?php  echo json_encode($ord_status_group); ?>;

                        for(var i = 0; i < tableNameArr.length; i++)
                        {
                            var customDataTableElement = '#ord_status_table_'+tableNameArr[i].f1;
                            $(customDataTableElement).DataTable().destroy();
                            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                            var customDataTableUrl     = baseUrl + 'order-getlist?table_data_count='+customDataTableCount+'&ord_order_status='+tableNameArr[i].f1;
                            var customDataTableColumns = [
                                {   'data'  : 'ord_title' ,
                                    'render' : function(data,type,row,meta)
                                    {
                                      var link = row.ord_title;
                                        link = '<a href="'+baseUrl+'order-details-'+row.ord_encrypted_id+'"  title="View Order Details" data-toggle="tooltip" >'+row.ord_title+'</a>&nbsp;';
                                      return link;
                                    }
                                },
                                {   'data'  : 'ord_cmp_id_value',
                                    'render': function(data, type, row, meta)
                                    {
                                        var link = row.ord_cmp_id_value;
                                          link = '<a href="'+baseUrl+'company-details-'+row.ord_cmp_encrypted_id+'" title="View Detail">'+row.ord_cmp_id_value+'</a>&nbsp;';
                                      return link;
                                    }
                                },
                                {   'data'  : 'ord_code' },
                                {   'data'  : 'ord_date_format'  },
                                {   'data'  : 'ord_reference_no'  },
                                {   'data'  : 'ord_type_value'  },
                                {   'data'  : 'ord_category_value'  },
                                {   'data'  : 'ord_id' ,
                                    'render': function(data, type, row, meta)
                                    {
                                      var link = '';

                                         link += '<a href="'+baseUrl+'order-edit-'+row.ord_encrypted_id+'" title="Edit Details "><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
                                        link += '<a href="javascript:;" title="Delete Order" data-toggle="tooltip"  data-module_id='+row.ord_id+' data-module_code='+row.ord_code+' onclick=deleteModule(this)><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                        link += '<a href="'+baseUrl+'purchase-order-print-'+row.por_encrypted_id+'" title="Print Purchase Order" data-toggle="tooltip"><i  class="fa fa-print" aria-hidden="true"></i></a>&nbsp;';
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
                                    echo 'exportAccess : true,';
                                    echo 'printAccess : true,';
                                ?>
                              }
                            });
                            //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                          getTablCount('#ord_status_table_'+tableNameArr[i].f1,'#ord_status_count_'+tableNameArr[i].f1);
                        }
                        
                    }
                    function getTablCount(tableName, countElement) {
                  $(tableName).on('draw.dt', function() {
                    var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
                    console.log(countElement);
                    $(countElement).html('' + (count ? count : 0) + '');
                  });
                }                  
        
                </script>
        </div>
    </body>
  </html>
