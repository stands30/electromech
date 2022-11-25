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
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
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
                                        <span class="caption-subject bold">Team List</span> &nbsp;
                                        <div id="btn-box" class="btn-group">
                                            <a id="sample_editable_1_new" href="<?php echo base_url('team-add'); ?>" class="btn green"> Add Team
                                                <i class="fa fa-plus"></i>
                                            </a>
                                       </div>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-quot table-list" id="tblteamlist">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-id-card-alt list-level"></i>Designation</th>
                                                <th><i class="fas fa-user list-level"></i>Name</th>
                                                <th><i class="fas fa-building list-level"></i>Department</th>
                                                <th><i class="fas fa-user list-level"></i>Reporting To</th>
                                                <th><i class="fas fa-building list-level"></i>Created On</th>
                                                <th><i class="fas fa-cog list-level"></i>Action</th>
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
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                      getTeamList();
                    })
                    function getTeamList()
                    {
                        var customDataTableElement = '#tblteamlist';
                        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                        var customDataTableUrl     =  baseUrl + 'team-getlist?table_data_count='+customDataTableCount;
                        var customDataTableColumns = [

                          {   'data'  : 'emp_designation',
                              'render': function(data, type, row, meta)
                            {
                                link = `<a href="`+baseUrl+`team-details-`+row.emp_id_encrypt+`" title="View Detail">
                                                                 `+row.emp_designation+`</a>&nbsp; `;
                              return link;
                            },
                          },

                          {   'data'  : 'emp_ppl_name' ,
                            'render': function(data, type, row, meta)
                            {
                                link = `<a href="`+baseUrl+`people-details-`+row.emp_ppl_encrypt+`" title="View Detail">
                                        `+row.emp_ppl_name+`</a>&nbsp;
                                `;
                              return link;
                            }
                          },
                          
                          {   'data'  : 'emp_dept_name'},
                          {   'data'  : 'emp_reporting_name' ,
                            'render': function(data, type, row, meta)
                            {
                                link = `<a href="`+baseUrl+`people-details-`+row.emp_reporting_encrypt+`" title="View Detail">
                                        `+row.emp_reporting_name+`</a>&nbsp;
                                `;
                              return link;
                            }
                          },
                          {   'data'  : 'emp_crdt_dt'},
                          {   'data'  : 'emp_id' ,
                            'render': function(data, type, row, meta)
                            {
                                link = `<a href="`+baseUrl+`team-edit-`+row.emp_id_encrypt+`" title="Edit Team ">
                                        <i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a onclick="deleteTeam('`+row.emp_id_encrypt+`')" title="Delete Team ">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                `;
                              return link;
                            }
                          }
                        ];
                        
                        $(customDataTableElement).DataTable().destroy();
                        customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                    }
                    function deleteTeam(teamid)
                    {
                      if(!confirm('Do you really want to delete this entry'))
                      {
                        return;
                      }
                      $.ajax(
                      {
                        type: "POST",
                        url: baseUrl + "team/deleteTeam/"+teamid,
                        success: function(response)
                        {
                          response = JSON.parse(response);
                          if (response.success == true)
                          {
                            swal({
                              title: "Done",
                              text: response.message,
                              type: "success",
                              icon: "success",
                              button: true,
                            })
                            setTimeout(function(){
                              getTeamList();
                            },1000)
                          }
                          else
                          {
                            swal({
                              title: "Opps",
                              text: "Something Went wrong",
                              type: "error",
                              icon: "error",
                              button: true,
                            });
                          }
                        }
                      });
                    }
                </script>
            </div>
        </body>
    </html>
