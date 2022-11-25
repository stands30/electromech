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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/subscription/subscription-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css">
    <style type="text/css">
        #trans_detail_list_wrapper .dataTables_wrapper .dt-buttons{
            display: none!important;
        }
    </style>
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
        <!-- OPTIONAL LAYOUT STYLES -->
        <div class="clearfix"> </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('common/sidebar'); ?>
                <div class="page-content-wrapper">
                    <div class="page-content page-content-detail">
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                       <div class="portlet">
                            <div class="row">
                                <div class="container-fluid">
                                     <aside class="profile-info col-md-12">
                                        <section class="panel">
                                             <label>make drop down editable for status</label>
                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading">Subscription Details</span>
                                                         <br>
                                                            <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    Expert Solution - S0001
                                                                </span>
                                                                <a class="btn-edit" href="#">
                                                                    <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                                </a>
                                                                <a class="btn-edit" href="<?php echo base_url('transaction-add') ?>">
                                                                    <i class="fa fa-plus"></i><span class="btn-text"> Add Transaction</span>
                                                                  </a>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                        <span class="created">Created By: Vinay Pagare
                                                        </span>
                                                        <br>
                                                        <span class="sp-date">Created On: 03rd May, 2019
                                                        </span>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="table-responsive" >
                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fas fa-address-card list-level"></i>Customer</td>
                                                            <td><a href="#">Reena</a></td>
                                                            <td><i class="fas fa-building list-level"></i> Company</td>
                                                            <td><a href="#">Expert Solutions</a></td>
                                                        </tr>                                                           
                                                        <tr>
                                                            <td><i class="fas fa-globe list-level"></i>Domain</td>
                                                            <td><a href="http://expert-solution.com/" target="_blank">http://expert-solution.com/</a></td>
                                                            <td><i class="fas fa-list-ul list-level"></i> Unique</td>
                                                            <td>S0001</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-database list-level"></i> Database</td>
                                                            <td>expert-solution</td>
                                                            <td><i class="fas fa-info-circle list-level"></i> Status</td>
                                                            <td>Active</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                     
                                        </section>                                        
                                    </aside>

                                    <aside class="profile-info col-md-12 mb-20">
                                        <section>
                                            <div class="portlet light table-bordered">
                                                <header class="">
                                                    <div class="detail-box mb-10">
                                                      <div>
                                                        <span class="panel-title">Transaction Details</span> 
                                                      </div>
                                                    </div>
                                                </header>

                                                <table class="table table-striped table-bordered table-list table-list-detail-custom" id="trans_detail_list">
                                                    <thead>
                                                        <tr>
                                                            <th>Subscription Id</th>
                                                            <th>Plan</th>
                                                            <th>User</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#">S0001</a></td>
                                                            <td>Empower</td>
                                                            <td>50</td>
                                                            <td>30th Apr, 2019</td>
                                                            <td>30th Apr, 2020</td>
                                                            <td>50,000.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#">S0001</a></td>
                                                            <td>Empower</td>
                                                            <td>50</td>
                                                            <td>30th Apr, 2019</td>
                                                            <td>30th Apr, 2020</td>
                                                            <td>50,000.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </aside>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    // getList();
                    $('#trans_detail_list').dataTable({
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
                            // { extend: 'print', className: 'btn dark btn-outline' },
                            // { extend: 'copy', className: 'btn red btn-outline' },
                            // { extend: 'pdf', className: 'btn green btn-outline' },
                            // { extend: 'excel', className: 'btn yellow btn-outline ' },
                            // { extend: 'csv', className: 'btn purple btn-outline ' },
                            // { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
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