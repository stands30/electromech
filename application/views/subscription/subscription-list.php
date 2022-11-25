<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
    <?php
    $global_asset_version = global_asset_version();
     $this->load->view('common/header_styles');
     ?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                                    <!-- <i class="icon-settings font-dark"></i> -->
                                    <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                                    <div  id="btn-box" class="btn-group">
                                      
                                        <a id="sample_editable_1_new" href="<?php echo base_url('subscription-add'); ?>" class="btn green"> Add Subscription
                                            <i class="fa fa-plus"></i>
                                        </a>
                                      
                                   </div>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-quot table-list" id="subscription_list">
                                    <thead>
                                        <tr>
                                            <th><i class="fas fa-user list-level"></i> Customer</th>
                                            <th><i class="fas fa-building list-level"></i> Company</th>
                                            <th><i class="fas fa-globe list-level"></i> Domain</th>
                                            <th><i class="fas fa-list-ul list-level"></i> Unique</th>           
                                            <th><i class="fas fa-database list-level"></i> Database</th>           
                                            <th><i class="fas fa-info-circle list-level"></i> Status</th>           
                                            <th><i class="far fa-calendar-alt list-level"></i>Created On</th>
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
            <!-- OPTIONAL SCRIPTS -->
            <!-- END OPTIONAL SCRIPTS -->
            <script type="text/javascript">

              $(document).ready(function(){
                getSubscriptionList();
              })

              function getSubscriptionList()
              {
                var customDataTableElement = '#subscription_list';
                var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                var customDataTableUrl     =  baseUrl + 'subscription/getSubscriptionList?table_data_count='+customDataTableCount;
                var customDataTableColumns = [
                   {  'data'  : 'cus_name',
                      'render': function(data, type, row, meta)
                      {
                          link = `<a href="`+baseUrl+`people-details-`+row.scr_ppl_id_encrypt+`" title="View Detail">
                                  `+row.cus_name+`</a>&nbsp;  `;
                        return link;
                      }
                   },
                   {  'data'  : 'cmp_name',
                      'render': function(data, type, row, meta)
                      {
                          link = `<a href="`+baseUrl+`company-details-`+row.scr_cmp_id_encrypt+`" title="View Detail">
                                  `+row.cmp_name+`</a>&nbsp;  `;
                        return link;
                      }
                   },
                   {  'data'  : 'scr_domain',
                      'render': function(data, type, row, meta)
                      {
                          link = `<a href="http://`+row.scr_domain+`.easynow.app" title="View Detail">
                                  `+row.scr_domain+`.easynow.app</a>&nbsp;  `;
                        return link;
                      }
                   },
                   {   'data'  : 'scr_uniquekey' },
                   {   'data'  : 'scr_database' },
                   {   'data'  : 'scr_status_name' },
                   {   'data'  : 'scr_crdt_dt_format' },
                   {   'data'  : 'scr_id' ,
                     'render': function(data, type, row, meta)
                     {
                      var link = '';

                      <?php if($detail_access) { ?>
                        link += `<a href="`+baseUrl+`subscription-details-`+row.scr_id_encrypt+`" title="Show Details"><i style="font-size: 18px; color:#4badf8;" class="fa fa-file" aria-hidden="true"></i></a>&nbsp;&nbsp;`;
                      <?php }?>

                      <?php if($edit_access) { ?>
                        link += `<a href="`+baseUrl+`subscription-edit-`+row.scr_id_encrypt+`" title="Edit Subscription"><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;`;
                      <?php }?>

                      <?php if($delete_access) { ?>
                        link += `<a onclick="deleteSubscription('`+row.scr_id_encrypt+`')" title="Delete Subscription"><i class="fa fa-trash" aria-hidden="true"></i></a>`;
                      <?php }?>

                      return link;
                     }
                   }
                 ];

                customDatatablex({
                  element: customDataTableElement, 
                  url: customDataTableUrl, 
                  columns: customDataTableColumns, 
                  buttons : true, 
                  serverSide : false,
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

              function deleteSubscription()
              {

              }

            </script>
        </div>
    </body>
</html>
