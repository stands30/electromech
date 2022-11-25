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
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
        <div class="page-content page-content-detail">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- -----MAIN CONTENTS START HERE----- -->
                <?php
                $cmpData['cmp_id'] = $companydata->cmp_id;
                $cmpencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id);
                $this->load->view('company/company_sidebar',$cmpData);
                ?>

                <aside class="profile-info col-lg-10 detail-view-list">
                  <section class="panel">
                    <?php
                      $cmp_id_encrypted = isset($companydata->cmp_id_encrypt) ? $companydata->cmp_id_encrypt:'' ; 
                      $cmp_id_value_encrypted = isset($companydata->cmp_name_encrypt) ? $companydata->cmp_name_encrypt:'' ;
                       ?>
                    <div class="">
                     <div class="portlet light bordered">
                          <div class="portlet-title">
                            <div class="caption font-dark">
                              <!-- <i class="icon-settings font-dark"></i> -->
                              <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                              <div class="btn-group">
                                <?php if($add_access){ ?>
                                <a  href="<?php echo base_url('project-add').'?cmp_id='.$cmp_id_encrypted .'&cmp_name='.$cmp_id_value_encrypted.'' ?>" title="Add Company Project" class="btn green btn-add-new">
                                  <i  class="fa fa-plus"  title="Add"></i> Add</a>
                              </div>
                               <?php } ?>

                            </div>
                            <div class="tools">
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover table-list" id="company_project_tbl">
                                <thead>
                                   <tr>
                                        <th><i class="fas fa-th-list list-level"></i>Project Title</th>
                                        <th><i class="fa fa-industry icon-company list-level"></i>Company</th>
                                        <th><i class="fa fa-user icon-people list-level"></i>Managed By </th>
                                        <th><i class="fa fa-info-circle list-level"></i>Status  </th>
                                        <th><i class="fas fa-chart-pie list-level"></i>Work Order</th>
                                        <th><i class="fas fa-map-marked-alt list-level"></i>Site Location</th>
                                        <th><i class="fas fa-calendar-alt list-level"></i>Created On </th>
                                        <th><i class="fas fa-cog list-level"></i> Action </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                            </div>

                          </div>
                       </div>
                    </div>
                  </section>
                </aside>
                <!-- MAIN CONTENTS END HERE -->
              </div>
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
      </div>

      <!-- Add Event people add -->


      <!-- Add Event people edit -->

      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
         <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      </div>
        <script type="text/javascript">

          $(document).ready(function(){
            getprjList();
          })

          function getprjList()
          {
            var customDataTableElement = '#company_project_tbl';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  =  <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'company-project-list-<?php echo $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id); ?>?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
                {
                  'data'  : 'prj_title' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = row.prj_title;
                    <?php if($detail_access) { ?>
                    link = '<a href="'+baseUrl+'project-details-'+row.prj_id_encrypt+'" title="Project Detail">'+row.prj_title+'</a>&nbsp';
                    <?php } ?>
                    return link;
                  }
                },
                {
                  'data'  : 'prj_cmp_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = row.cmp_value;
                    <?php if($detail_access) { ?>
                    link = '<a href="'+baseUrl+'company-details-'+row.prj_cmp_id_encrypt+'" title="Company Detail">'+row.cmp_value+'</a>&nbsp';
                    <?php } ?>
                    return link;
                  }
                },
                {
                  'data'  : 'manage_by_value' }
                ,
                {
                  'data'  : 'prj_project_status_value' }
                ,
                {
                  'data'  : 'prj_work_ord' }
                ,
                {
                  'data'  : 'prj_site_loc' }
                ,
                {
                  'data'  : 'crdt_dt' }
                ,
                {   'data'  : 'prj_id' ,
                  'render': function(data, type, row, meta)
                  {
                      
                    var link = ``;

                    if(row.private_access == 0)
                      return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                    <?php if($edit_access) { ?>
                      link += `
                        <a href="`+baseUrl+`project-edit-`+row.prj_id_encrypt+`" title="View Detail">
                        <i  class="fa fa-edit" aria-hidden="true" title="Edit Company Project"></i></a>`;

                    <?php }?>

                    <?php if($delete_access) { ?>
                      link += ' <a onclick="deleteProjectCompany('+row.prj_id+')" title="Delete Project"><i class="fa fa-trash" aria-hidden="true"></i></a>';

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

        function deleteProjectCompany(prj_id)
        {
          cswal({
            text : 'Do you want to delete this record?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: "project/updateProjectCustomData",
                data:{
                    prj_id:prj_id,
                    field_value:2,
                    field:'prj_status'
                  },
                success: function(response) {
                  response = JSON.parse(response);
                  if(response.success == true) {
                    swal({
                      title: "Done",
                      text: "Deleted Successfully",
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
                  location.reload();
                }
              });
            }
          });
        }
        </script>
      </body>
    </html>
