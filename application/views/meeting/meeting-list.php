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
    <!-- OPTIONAL LAYOUT STYLES -->
   
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                  <a id="sample_editable_1_new" href="<?php echo base_url('meeting-add'); ?>" class="btn green btn-add-new"> Add New
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
              <table class="table table-bordered table-list" id="tblmeetinglist">
                <thead>
                  <th><i class="fas fa-th-list list-level"></i>Title</th>
                  <th><i class="fas fa-th-list list-level"></i>Host</th>
                  <th><i class="fas fa-th-list list-level"></i>Meeting with</th>
                  <th><i class="fas fa-calendar-alt list-level"></i>From</th>
                  <th><i class="fas fa-calendar-alt list-level"></i>To</th>
                  <th><i class="fas fa-info-circle list-level"></i>Status</th>                  
                  <th><i class="fas fa-cog list-level"></i>Action</th>
                </thead>
                <tbody>
                </tbody>
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
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
     
    </div>
      <script type="text/javascript">

        $(document).ready(function(){
          getMeetingList();
        })

        function getMeetingList()
        {
          var customDataTableElement = '#tblmeetinglist';
          var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
          var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
          var customDataTableUrl     =  baseUrl + 'meeting-getlist?table_data_count='+customDataTableCount;

          var customDataTableColumns = [
            {   'data'  : 'mtg_title' ,
              'render': function(data, type, row, meta)
              {


                  var link = row.mtg_title;

                  <?php if($detail_access) { ?>
                      link = '<a href="'+baseUrl+'meeting-details-'+row.mtg_id_encrypt+'" >' + data + '</a>';
                  <?php }?>
                return link;

              }
            },
            {   'data'  : 'mtg_host_name' ,
              'render': function(data, type, row, meta)
              {


                  var link = row.mtg_host_name;

                  <?php if($detail_access) { ?>
                      link = '<a href="'+baseUrl+'people-details-'+row.mtg_host_encrypt+'" >' + row.mtg_host_name + '</a>';
                  <?php }?>
                return link;

              }
            },
            {   'data'  : 'mtg_people_names' },
            {   'data'  : 'mtg_from_dt_time_format' },
            {   'data'  : 'mtg_to_dt_time_format' },
            {   'data'  : 'mtg_status' },
            {   'data'  : 'mtg_id' ,
              'render': function(data, type, row, meta)
              {

                var link = ``;

                if(row.private_access == 0){
                  return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                }

                <?php if($edit_access) { ?>
                  link += `<a href="`+baseUrl+`meeting-edit-`+row.mtg_id_encrypt+`" title="Edit Details ">
                    <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;`;


                <?php }?>

                <?php if($delete_access) { ?>
                  link += `<a onclick="deleteMeeting('`+row.mtg_id_encrypt+`')" title="Delete Details ">
                  <i class="fa fa-trash" aria-hidden="true"></i></a>`;
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

        function deleteMeeting(mtg_id)
        {
          cswal({
            text : 'Do you want to delete this Entry?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: baseUrl + "meeting-delete-"+mtg_id,
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
  </body>
</html>
