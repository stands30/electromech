<!-- <!DOCTYPE html> -->
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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?>
      <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
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
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet light bordered">
            <div class="portlet-title">
               <span class="caption-subject bold">Event List</span> &nbsp;
               <div class="btn-group">
                  <a id="" href="<?php echo base_url('event-people-add'); ?>" class="btn green"> Add New
                      <i class="fa fa-plus"></i>
                  </a>
                </div>
              <div class="tools"></div>
            </div>
            <div class="portlet-body">
              <table id="tbleventlist" class="table table-bordered table-list">
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>People Name</th>
                    <th>Remark</th>
                    <th>Date</th>
                    <th>Created By</th>
                    <th>Created On</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- -MAIN CONTENTS END HERE -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
      <script type="text/javascript">

        $(document).ready(function(){
          getPeopleEventList();
        })


        function getPeopleEventList()
        {
            var customDataTableElement = '#tbleventlist';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'people-event-getlist?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
              {   'data'  : 'event_name' ,
                'render': function(data, type, row, meta)
                {
                    link = `<a href="`+baseUrl+`event-details-`+row.evt_id_encrypt+`" title="View Detail">`+row.event_name+`</a>&nbsp`;
                  return link;
                }
              },
              {   'data'  : 'people_name' ,
                'render': function(data, type, row, meta)
                {
                    link = `<a href="`+baseUrl+`people-details-`+row.ppl_id_encrypt+`" title="View Detail">`+row.people_name+`</a>&nbsp;`;
                  return link;
                }
              },
              {   'data'  : 'evt_desc' },
              {   'data'  : 'event_date' },
              {   'data'  : 'event_crtd_by' },
              {   'data'  : 'epl_crdt_dt' }
            ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                     

        }
      </script>
    </div>
  </body>
</html>
