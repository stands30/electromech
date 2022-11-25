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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                <span class="caption-subject bold">Target List
                </span> &nbsp;
                <div class="btn-group">
                  <a id="sample_editable_1_new" href="<?php echo base_url('target-add'); ?>" class="btn green"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                </div>
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover table-list" id="module-list">
                <thead>
                  <tr>
                    <th><i class="fas fa-bullseye list-level"></i>Target Name</th>
                    <th><i class="fas fa-user-tie list-level"></i> Target Responsible</th>
                    <th><i class="fas fa-id-card list-level"></i>Target Amount</th>
                    <th><i class="fas fa-id-card list-level"></i>Target Count</th>
                    <th><i class="fas fa-cog list-level"></i>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="<?php echo base_url('target-details') ?>">Hot Leads</a></td>
                    <td><a href="#">Rohan</a></td>
                    <td>50,000.00</td>
                    <td>20</td>
                    <td>
                      <a href="#" title="Edit Target">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="#" title="Delete Target">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
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
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">
          $(document).ready(function(){
              // getList();
              $('#module-list').dataTable({
                  // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                  "language": {
                      "aria": {
                          "sortAscending": ": activate to sort column ascending",
                          "sortDescending": ": activate to sort column descending"
                      },
                      "emptyTable": "No data available in table",
                      "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                      "infoEmpty": "No entries found",
                      "infoFiltered": "(filtered1 from _MAX_ total entries)",
                      "lengthMenu": "_MENU_ entries",
                      "search": "Search:",
                      "zeroRecords": "No matching records found"
                  },

                  // Or you can use remote translation file
                  //"language": {
                  //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                  //},
                  

                  buttons: [
                      { extend: 'print', className: 'btn dark btn-outline' },
                      { extend: 'copy', className: 'btn red btn-outline' },
                      // { extend: 'pdf', className: 'btn green btn-outline' },
                      { extend: 'excel', className: 'btn yellow btn-outline ' },
                      // { extend: 'csv', className: 'btn purple btn-outline ' },
                      { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                  ],

                  // setup responsive extension: http://datatables.net/extensions/responsive/
                  responsive: false,

                  //"ordering": false, disable column ordering
                  //"paging": false, disable pagination
                  "order": [

                  ],

                  "lengthMenu": [
                      [100,200,-1],
                      [100,200,"All"] // change per page values here
                  ],
                  // set the initial value
                  "pageLength": 100,

                  "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

                  // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                  // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/project/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                  // So when dropdowns used the scrollable div should be removed.
                  //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
              });
          });
      </script>
    </div>
  </body>
</html>
