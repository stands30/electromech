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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?>
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    
    <!-- END OPTIONAL LAYOUT STYLES -->
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
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->
                <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                <div class="btn-group">
                  <?php if($add_access) { ?>
                  <a id="sample_editable_1_new" href="<?php echo base_url('event-add'); ?>" class="btn green btn-add-new"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                  <?php } ?>
                </div>
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover table-list" id="eventList">
                <thead>
                  <tr>
                    <th><i class="far fa-calendar list-level"></i>Event Name
                    </th>
                    <th><i class="fas fa-calendar-alt list-level"></i>Date
                    </th>
                    <th>Managed By</th>
                    <!--<th>  Created By
                    </th>-->
                    <th><i class="fas fa-cog list-level"></i>Action
                    </th>
                  </tr>
                </thead>
              <tbody>


                </tbody>
              </table>
            </div>
          </div>
          <!-- MAIN CONTENTS END HERE -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
          <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
      <!-- END OPTIONAL SCRIPTS -->

      <script type="text/javascript">
      $(document).ready(function(){
        getEventList();
      })

      function getEventList()
      {
        var customDataTableElement = '#eventList';
        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
        var customDataTableUrl     =  baseUrl + 'event-getlist?table_data_count='+customDataTableCount;
        var customDataTableColumns = [
           {  'data'  : 'evt_name',
              'render': function(data, type, row, meta)
              {
                  link = `<a href="`+baseUrl+`event-details-`+row.evt_encrypt_id+`" title="View Detail">
                          `+row.evt_name+`</a>&nbsp;  `;
                return link;
              }
           },
           {   'data'  : 'evt_date' },
           {   'data'  : 'evt_date',
             'render': function(data, type, row, meta)
             {
              var link = 'Managed By';
              return link;
            }
          },
           {   'data'  : 'evt_encrypt_id' ,
             'render': function(data, type, row, meta)
             {
              var link = '';

              <?php if($edit_access) { ?>
                link += `<a href="`+baseUrl+`event-edit-`+row.evt_encrypt_id+`" title="Edit Events">
                     <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;`;
              <?php }?>

              <?php if($delete_access) { ?>
                link += `<a onclick="deleteEvent('`+row.evt_id+`')" title="Delete Events">
                     <i class="fa fa-trash" aria-hidden="true"></i></a>`;
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

        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);

      }
      function deleteEvent(evt_id)
      {
        var type = '1';
        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        }).then(()=>{
            $.ajax({
                type: "POST",
                url: "Event/deleteEvent",
                data:{evt_id:evt_id,type:type},
                dataType:"json",
                success:function(response)
                {
                    location.reload();
                }
                });
              }
           );

      }
      </script>
    </div>
  </body>
</html>
