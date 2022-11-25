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
   
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
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
                <span class="caption-subject bold">Email Template List
                </span> &nbsp;
                <div class="btn-group">
                  <a id="sample_editable_1_new" href="<?php echo base_url('email-template-add'); ?>" class="btn green btn-add-new"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                </div>
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body">
              <table class="table table-bordered table-list" id="emailTempList">
                <thead>
                  <th>Title</th>
                  <th>Subject</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <!-- <tr>
                    <td><a href="<?php echo base_url('email-template-detail'); ?>">New Test Email</a></td>
                    <td>Pooja</td>
                    <td>Creating new email template</td>
                    <td>Ankush</td>
                    <td>Stanley</td>
                    <td>
                      <a href="#" title="Edit Details"><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>
                    </td>
                  </tr> -->
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
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          getEmailTempList();
        })
        function getEmailTempList()
        {
          var customDataTableElement = '#emailTempList';
          var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
          var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
          var customDataTableUrl     =  baseUrl + 'emailTemp-getlist?table_data_count='+customDataTableCount;
          var customDataTableColumns = [
              {   'data'  : 'emt_title' ,
                'render': function(data, type, row, meta)
                {
                    link = `<a href="`+baseUrl+`email-template-detail-`+row.emt_id_encrypt+`" title="View Detail">
                            `+row.emt_title+`</a>&nbsp;
                    `;
                  return link;
                }
              },
              {   'data'  : 'emt_subject' },
              {   'data'  : 'emt_id' ,
                'render': function(data, type, row, meta)
                {
                    link = `<a href="`+baseUrl+`email-template-edit-`+row.emt_id_encrypt+`" title="Edit Email Template ">
                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                    `;
                  return link;
                }
              }
            ];
          customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, <?php echo isadmin(); ?>, customDataTableServer);
        }
      </script>
    </div>
  </body>
</html>
