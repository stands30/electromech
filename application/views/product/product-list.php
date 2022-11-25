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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/product/css/product-custom.css<?php echo $global_asset_version; ?>">
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
                                    <div  id="btn-box" class="btn-group">
                                      <?php if($add_access) { ?>
                                        <a id="sample_editable_1_new" href="<?php echo base_url('product-add'); ?>" class="btn green"> Add Product
                                            <i class="fa fa-plus"></i>
                                        </a>
                                      <?php } ?>
                                   </div>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                              <div class="form-group col-md-4 no-left-padding">
                                <label class="drp-title">Make</label>
                                <div class="input-icon">
                                  <i class="fas fa-project-diagram list-level"></i>
                                  <select name="prd_category" id="prd_category" class="form-control category-select2">
                                  </select>
                                </div>
                              </div>
                              <div class="btn-group">
                                <button type="button" name="button" class="form-control btn btn_save btn-add-new btn green btn-list-search" onclick="getProductList()" id="getList">Search</button>
                              </div>
                                <table class="table table-striped table-bordered table-hover table-quot table-list" id="tblproductlist">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-cart-plus list-level"></i>Product Name</th>
                                            <th><i class="fas fa-qrcode color-dark-blue list-level"></i>Product Code</th>
                                            <th><i class="fas fa-project-diagram list-level"></i>Product Make</th>
                                            <th><i class="fas fa-address-card list-level"></i>HSN</th>
                                            <th><i class="fas fa-id-card list-level"></i>Tax</th>
                                            <th><i class="fas fa-cog list-level"></i>Action </th>
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
             <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <!-- OPTIONAL SCRIPTS -->
            <!-- END OPTIONAL SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function(){
              getProductList();
              $('#prd_category').select2({
              placeholder: "Please Select Make",
              ajax: {
                url:baseUrl+'product/getGenPrmforDropdown/prd_category',
                dataType: 'json',
              }
            });
            });
            
            function getProductList()
            {
              var prd_category          = $('#prd_category').val();
              var productCategory        = $('.category-select2').val();
              var customDataTableElement = '.table-list';
              $('#tblproductlist').DataTable().destroy();
              var customDataTableElement = '#tblproductlist';
              var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
              var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
              var customDataTableUrl     = baseUrl + 'product-getlist?table_data_count='+customDataTableCount+'&prd_category='+prd_category;
              var customDataTableColumns = [
                  {   'data'  : 'prd_name' ,
                    'render': function(data, type, row, meta)
                    {
                      nexlog(' unit : '+row.prd_unit_name);
                        var prd_name = (row.prd_unit_name != null) ? row.prd_name+' - '+row.prd_unit_name:row.prd_name;
                        var link = prd_name;
                      nexlog(' link : '+link+' row.private_access : '+row.private_access);
                        <?php if($detail_access) { ?>
                            link = `<a href="`+baseUrl+`product-details-`+row.prd_id_encrypt+`" title="View Detail">
                                                             `+prd_name+`</a>&nbsp; `;
                        <?php }?>
                      return link;
                    }
                  },
                  {   'data'  : 'prd_code',
                     'render': function(data, type, row, meta)
                     {
                      var link = row.prd_code;
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

                  {   'data'  : 'prd_hsn_code' },
                  {   'data'  : 'prd_gst' },



                  {   'data'  : 'prd_id' ,
                    'render': function(data, type, row, meta)
                    {
                      var link = '';
                      if(row.private_access == 0)
                        return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                      <?php if($edit_access) { ?>
                        link += '<a href="'+baseUrl+'product-edit-'+row.prd_id_encrypt+'" title="Edit Product "><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
                      <?php }?>
                      <?php if($delete_access) { ?>
                        link += '<a onclick="deleteProduct(\''+row.prd_id_encrypt+'\')" title="Delete Product "><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
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
        <script type="text/javascript">

        function deleteProduct(prd_id)
        {
          cswal({
            text : 'Do you want to delete this Product?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: "product/deleteProduct",
                data:{prd_id:prd_id},
                success: function(response) {
                  response = JSON.parse(response);
                  if(response.success == true) {
                    swal({
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                    })
                  } else {
                    swal({
                      title: "Opps",
                      text: "Something Went wrong",
                      type: "error",
                      icon: "error",
                      button: true,
                    });
                  }
                  location.href = response.linkn;
                }
              });
            }
          });
        }
        </script>
        </div>
    </body>
</html>
