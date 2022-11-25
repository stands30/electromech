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
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/inventory/css/inventory-custom.css<?php echo $global_asset_version; ?>">
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
            <div class="portlet light bordered portlet-custom">
              <div class="portlet-title">
                  <div class="caption font-dark">
                      <!-- <i class="icon-settings font-dark"></i> -->
                      <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                        <?php if($add_access) { ?>
                      <a id="sample_editable_1_new" href="<?php echo base_url('inventory-add'); ?>" class="btn green">  In <i class="fa fa-plus"></i> </a>
                      <a id="sample_editable_3_new" href="inventory-add-purchase" class="btn green"> Purchase Order In<i class="fa fa-plus"></i></a>
                       <a id="sample_editable_2_new" href="<?php echo base_url('inventory-out'); ?>" class="btn green">  Out <i class="fa fa-plus"></i> </a>
                       <a id="sample_editable_3_new" href="<?php echo base_url('inventory-out-dispatch'); ?>" class="btn green"> Dispatch Out <i class="fa fa-plus"></i> </a>
                    <?php } ?>
                  </div>
                  <div class="tools"> </div>
              </div>
              <div class="portlet-body">
                 <div class="form-group col-md-4 no-left-padding">
                    <label class="drp-title">Location</label>
                  <div class="input-icon">
                    <i class="fas fa-map-marked-alt list-level"></i>
                    <select name="piv_location" id="piv_location" class="form-control location-select2">
                    </select>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" name="button" class="form-control btn btn_save btn-add-new btn green btn-list-search" onclick="getProductList()" id="getList">Search</button>
                </div>
                  <table class="table table-striped table-bordered table-hover table-quot table-list" id="tblproductlist">
                      <thead>
                          <tr>
                            <th><i class="fa fa-cart-plus icon-product list-level"></i>Product</th>
                            <th><i class="fas fa-project-diagram list-level"></i>Category</th>
                            <th><i class="fas fa-coins list-level"></i>Average Cost</th>
                            <th><i class="fas fa-cubes list-level"></i> Total Stock</th>
                            <th><i class="fas fa-cog list-level"></i> Action</th>
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
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
           <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <!-- OPTIONAL SCRIPTS -->
          <!-- END OPTIONAL SCRIPTS -->
         <script type="text/javascript">
                $(document).ready(function(){
                  getProductList();
                  $('#piv_location').select2({
                  placeholder: "Please Select Location",
                  ajax: {
                    url:baseUrl+'inventory/getGenPrmforDropdown/piv_location',
                    dataType: 'json',
                  }
                });
                });
                function getProductList()
                {
                  var piv_location          = $('#piv_location').val();
                  var customDataTableElement = '.table-list';
                  $('#tblproductlist').DataTable().destroy();
                  var customDataTableElement = '#tblproductlist';
                  var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                  var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                  var customDataTableUrl     =  baseUrl + 'inventory-getlist?table_data_count='+customDataTableCount+'&piv_location='+piv_location;
                  var customDataTableColumns = [
                      {   'data'  : 'prd_name' ,
                        'render': function(data, type, row, meta)
                        {
                          nexlog(' unit : '+row.prd_unit_name);
                            var prd_name = (row.prd_unit_name != null) ? row.prd_name+' - '+row.prd_unit_name:row.prd_name;
                            var link = prd_name;
                          nexlog('prd_name : '+prd_name+' link : '+link+' row.private_access : '+row.private_access);
                            if(row.private_access == 0)
                              {
                                return link;
                              }
                            <?php if($detail_access) { ?>
                                link = `<a href="`+baseUrl+`inventory-details-`+row.prd_encrypted_id+`" title="View Detail">
                                                                 `+prd_name+`</a>&nbsp; `;
                            <?php }?>
                          return link;
                        }
                      },

                    {   'data'  : 'prd_category_name',
                         'render': function(data, type, row, meta)
                         {
                          var link = row.prd_category_name;
                          return link;
                        }
                      },

                      {   'data'  : 'avg_cost',
                        'render': function(data, type, row, meta)
                         {
                          var link=row.avg_cost;
                          if(row.avg_cost != '')
                          {
                            link = indiancurrency(parseFloat(row.avg_cost).toFixed(2));
                          }
                          return link;
                        }
                      },
                      {   'data'  : 'total_stock' },



                      {   'data'  : 'prd_id' ,
                        'render': function(data, type, row, meta)
                        {
                          var link = '';
                          <?php if($detail_access) { ?>
                            link += '<a href="'+baseUrl+'inventory-details-'+row.prd_encrypted_id+'" title="View Inventory Details "><i class="fa fa-list" aria-hidden="true"></i></a>&nbsp;';
                          <?php }?>
                         
                          return link;
                        }
                      }
                    ];
                  // customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
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
                }
            </script>
        </div>
    </body>
  </html>
