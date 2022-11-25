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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/order/css/order-custom.css<?php echo $global_asset_version; ?>">
    <!-- END OPTIONAL LAYOUT STYLES -->
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
        <!-- OPTIONAL LAYOUT STYLES -->
        <!-- END OPTIONAL LAYOUT STYLES -->
        <div class="clearfix"> </div>
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
                            <div class="breadcrumb-button">
                                <a href="<?php echo base_url() ?>" class=" previous" title="">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </a>
                                <a href="<?php echo base_url() ?>" class="next">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- -----MAIN CONTENTS START HERE----- -->
                        <div class="row">
                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <label>make drop down editable for Order Type, Order Category , Order Status</label>
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Order Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                                Cable - ORD1235
                                                        </span>&nbsp;&nbsp;
                                                        <a class="btn-edit" href="#">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a>                                                      
                                                        <a class="btn-edit" href="#">
                                                            <i class="fa fa-trash"></i><span class="btn-text"> Delete</span>
                                                        </a>
                                                        <a class="btn-edit" href="#">
                                                            <i class="fas fa-truck-loading"></i><span class="btn-text"> Dispatch Order</span>
                                                        </a>
                                                        <span class="order-tags status-processing">Processing</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: Vinay Pagare (Admin)
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: 13th Apr, 2019
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style" >
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-boxes list-level"></i>Order No</td>
                                                        <td>
                                                            <?php echo isset($order->ord_code) ? $order->ord_code:''; ?>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                        <td>    <?php echo isset($order->ord_date_format) ? $order->ord_date_format:''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-handshake icon-client list-level"></i>Billing Company </td>
                                                        <td><a href="#"><?php echo isset($order->ord_billing_cmp_value) ? $order->ord_billing_cmp_value:''; ?></a></td>
                                                        <td><i class="fas fa-handshake icon-client list-level"></i>Client</td>
                                                        <td><a href="#"><?php echo isset($order->ord_cmp_id_value) ? $order->ord_cmp_id_value:''; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td><i class="fas fa-id-card list-level"></i>Reference No</td>
                                                        <td><?php echo isset($order->ord_reference_no) ? $order->ord_reference_no:''; ?></td> 
                                                        <td><i class="fas fa-file-medical list-level"></i> Order Type</td>
                                                        <td><a href="#"><?php echo isset($order->ord_type_value) ? $order->ord_type_value:''; ?></a></td> 
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td><i class="fas fa-layer-group list-level"></i> Order Category </td>
                                                        <td><a href="#"><?php echo isset($order->ord_category_value) ? $order->ord_category_value:''; ?></a></td>
                                                        <td><i class="fas fa-cart-plus list-level"></i> Order Status</td>
                                                        <td ><a href="#"><?php echo isset($order->ord_order_status_value) ? $order->ord_order_status_value:''; ?></a></td> 
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-user list-level"></i> Payment Due Days</td>
                                                        <td><?php echo isset($order->ord_payment_due_days) ? $order->ord_payment_due_days:''; ?></td>

                                                        <td><i class="fas fa-user list-level"></i> Dispatch Due Days</td>
                                                        <td><?php echo isset($order->ord_dispatch_due_days) ? $order->ord_dispatch_due_days:''; ?></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>

                            <aside class="profile-info col-md-12 mb-20">
                                <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel">
                                        <div class="portlet-title tabbable-line tabbable-line-lead">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#portlet_ord_decs" data-toggle="tab"> Order Description</a>
                                                </li>
                                                <li>
                                                    <a href="#portlet_ord_mgnt" data-toggle="tab"> Order Management </a>
                                                </li>
                                                <li>
                                                    <a href="#portlet_act" data-toggle="tab"> Activity </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="portlet_ord_decs">
                                                    <header class="">
                                                        <div class="detail-box mb-10">
                                                          <div>
                                                              <span class="panel-title">Product list</span> 
                                                          </div>
                                                        </div>
                                                    </header>
                                                    <?php $tax = false;
                                                     if(isset($order->ord_billing_cmp_state) && isset($order->ord_cmp_state) && $order->ord_billing_cmp_state != '0' && $order->ord_cmp_state != '0' ) 
                                                           {
                                                             if($order->ord_billing_cmp_state == $order->ord_cmp_state)
                                                             {
                                                                $tax = true;
                                                             }

                                                           }
                                                     ?>
                                                    <div class="flip-scroll table-div">
                                                <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content">
                                                    <thead class="flip-content">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Description</th>
                                                            <?php if($product_size == '1') { ?>
                                                            <th>Variant</th>
                                                            <?php } ?>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Discount</th>
                                                           <?php if($product_tax == '1') { ?>
                                                              <th>Sub-Total</th>
                                                               <?php 
                                                                if( $tax_computation == 1 && $order->ord_product_tax == '1')
                                                                { 
                                                                  if($tax == true){ ?>
                                                                  <th>CGST</th>
                                                                  <th>SGST</th>
                                                                  <?php }
                                                                  else
                                                                   { ?>
                                                                  <th>IGST</th>
                                                                <?php } 
                                                                } 
                                                              }
                                                              ?>
                                                            <th>Total</th>  
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Cable</td>
                                                            <td>Cabel with 0.5mm</td>
                                                            <td>10 Kg</td>                                                    
                                                            <td>5</td>
                                                            <td>1800.00</td>
                                                            <td>50.00</td>
                                                            <td>1750.00</td>
                                                            <td>0 (0%)</td>
                                                            <td>1750.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                                   <!-- <div class="portlet light table-bordered">
                                                       <header class="">
                                                            <div class="detail-box mb-10">
                                                              <div>
                                                                <span class="panel-title">Product Details</span> 
                                                              </div>
                                                            </div>
                                                        </header>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-quot table-list table-content-details" id="module-list">
                                                                <thead class="flip-content">
                                                                    <tr>
                                                                        <th>Product</th>
                                                                        <th>Description</th>
                                                                        <th>Size</th>
                                                                        <th>Quantity</th>
                                                                        <th>Amount</th>
                                                                        <th>Discount</th>
                                                                        <th>Sub Total</th>
                                                                        <th>Tax</th>
                                                                        <th>Total</th>                             
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Cable</td>
                                                                        <td>Cabel with 0.5mm</td>
                                                                        <td>10 Kg</td>                                                    
                                                                        <td>5</td>
                                                                        <td>1800.00</td>
                                                                        <td>50.00</td>
                                                                        <td>1750.00</td>
                                                                        <td>0 (0%)</td>
                                                                        <td>1750.00</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"></td>
                                                                        <td>Total</td>
                                                                        <td>50.00</td>
                                                                        <td>1800.00</td>
                                                                        <td>0.00</td>
                                                                        <td>1750.00</td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                   </div> -->
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <div class="table-responsive deatil-table total-table-list">
                                                                <table class="table table-bordered  flip-content custom-flip-content">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-right">Amount</td>
                                                                            <td class="text-right bold">1,800.00</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-right">Discount (Rs)</td>
                                                                            <td class="text-right bold">50.00</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-right">Sub-Total</td>
                                                                            <td class="text-right bold">1,750.00</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td class="text-right">Tax (0%)</td>
                                                                            <td class="text-right bold">0.00</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="text-right">Total</td>
                                                                            <td class="text-right bold">1,750.00</td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="tab-pane " id="portlet_ord_mgnt">
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <div class="col-md-12 no-side-mobile-padding">
                                                                <section>
                                                                    <div class="col-md-12 no-side-padding">
                                                                        <div class="btn-group btn-custom-block">
                                                                            <a href="<?php echo base_url('order-print') ?>" class="btn green"> Print Package Slip</a>
                                                                            <a href="<?php echo base_url('invoice-add') ?>" class="btn green"> Convert To Invoice</a>
                                                                            <a href="<?php echo base_url('invoice-details-M2NFN2VEa2JtMzhiTWVxeC9pdC82Zz09') ?>" class="btn green">View Invoice</a>
                                                                            <a href="#" class="btn green" data-toggle="modal" data-target="#shipping-edit">Confirm / Edit Shipment</a>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div> 
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                      <div class="container-fluid">
                                                        <div class="col-md-12 no-side-mobile-padding">
                                                            <section>
                                                                  <div class="col-md-6 col-sm-6 padding-left-details">
                                                                      <header class="">
                                                                          <div class="detail-box mb-10">
                                                                              <div>
                                                                                  <span class="panel-title">Billing</span>
                                                                              </div>

                                                                          </div>
                                                                      </header>
                                                                      <section class="panel panel-list">
                                                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel">  
                                                                                  <div class="table-responsive" >
                                                                                      <table class="table table-detail-custom table-stylm table-item" style="margin-bottom: 0px">
                                                                                          <tbody>                                                                
                                                                                              <tr>
                                                                                                  <td>Address</td>
                                                                                                  <td>6/52, First Floor, Shree Ganesh Krupa CHS pp Bharat Petrol Pump, Link Rd, Kandivali West</td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                  <td>GST Number</td>
                                                                                                  <td>27BGSPP1771J1ZQ</td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                  <td>People</td>
                                                                                                  <td>Vinay Pagare</td>
                                                                                              </tr>
                                                                                          </tbody>
                                                                                      </table>
                                                                                  </div>
                                                                          </div>
                                                                      </section>
                                                                  </div>
                                                                  <div class="col-md-6 col-sm-6 padding-right-details">
                                                                      <header class="">
                                                                          <div class="detail-box mb-10">
                                                                              <div>
                                                                                  <span class="panel-title">Shipping</span>
                                                                              </div>

                                                                          </div>
                                                                      </header>
                                                                      <section class="panel panel-list">
                                                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel">  
                                                                                  <div class="table-responsive" >
                                                                                      <table class="table table-detail-custom table-stylm table-item" style="margin-bottom: 0px">
                                                                                          <tbody>                                                                
                                                                                          <tr>
                                                                                            <td> Address</td>
                                                                                            <td>6/52, First Floor, Shree Ganesh Krupa CHS pp Bharat Petrol Pump, Link Rd, Kandivali West</td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                              <td>GST Number</td>
                                                                                              <td>27BGSPP1771J1ZQ</td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                              <td>People</td>
                                                                                              <td>Vinay Pagare</td>
                                                                                          </tr>
                                                                                      </tbody>
                                                                                      </table>
                                                                                  </div>
                                                                          </div>
                                                                      </section>
                                                                  </div> 
                                                            </section>
                                                            <div class="clearfix"></div>
                                                            <section>
                                                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view courier-details mb-20">
                                                                    <div class="table-responsive">
                                                                        <table class="table custom table-detail-custom table-style" >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="4"><i class="fa fa-comment list-level"></i> Remarks</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4" class="order-sub-details">
                                                                                        Remarks for Order Details
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td colspan="4"><i class="fa fa-comments list-level"></i> Terms & Condition </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4" class="order-sub-details">
                                                                                        Terms & Condition for Order Details
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            <section>
                                                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view courier-details">
                                                                    <div class="table-responsive">
                                                                        <table class="table custom table-detail-custom table-style" >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><i class="fas fa-calendar-alt list-level"></i>Courier Date </td>
                                                                                    <td>    13th Apr, 2019</td>
                                                                                    <td><i class="fas fa-boxes list-level list-level"></i>Courier Name </td>
                                                                                    <td>Blue Dart </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    
                                                                                    <td><i class="fas fa-globe list-level"></i> Courier Website </td>
                                                                                    <td><a href="www.bluedart.com" target="_blank">www.bluedart.com</a></td> 
                                                                                    <td><i class="fas fa-cubes list-level"></i> AWB No</td>
                                                                                    <td>57920</td> 
                                                                                </tr>
                                                                               
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </section>

                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="portlet_act">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                          <div class="portlet light bordered portlet-container portlet-activity">
                                                            <div class="portlet-title">
                                                              <div class="caption">
                                                                  <i class="icon-share font-dark hide"></i>
                                                                  <span class="caption-subject bold">Recent Activities</span>
                                                              </div>
                                                              <div class="actions">
                                                                <div class="btn-group">
                                                                    <a class="btn green btn-add-new pull-right" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </a>
                                                                    <a href="javascript:;" class="btn-check-reload pull-right" data-toggle="tooltip" data-original-title="Reload">
                                                                      <i class="fas fa-sync-alt"></i>
                                                                    </a>

                                                                    <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                                       <label class="mt-checkbox mt-checkbox-outline">
                                                                            <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" checked="" /> All
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-checkbox mt-checkbox-outline">
                                                                            <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> People
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-checkbox mt-checkbox-outline">
                                                                            <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Quotation
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-checkbox mt-checkbox-outline">
                                                                            <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Invoice
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-checkbox mt-checkbox-outline">
                                                                            <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Follow-up
                                                                            <span></span>
                                                                        </label>
                                                                         <label class="mt-checkbox mt-checkbox-outline">
                                                                            <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Lead
                                                                            <span></span>
                                                                        </label>
                                                                      
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="portlet-body" tabindex="-1">
                                                              <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0" >
                                                                <div class="recent-activity-log">
                                                                  <div class="activity-list">
                                                                    <div class="activity-item">
                                                                      <div class="activity-content filter_all">
                                                                        <span class="activity-main-text">
                                                                          <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Order Categories</span> from <span class="activity-start-status">Big Basket</span> to <span class="activity-end-status">Amazon</span>
                                                                        </span>
                                                                        <span class="activity-time"> 2 months ago</span>
                                                                      </div>
                                                                    </div>

                                                                    <div class="activity-item">
                                                                      <div class="activity-content filter_all">
                                                                        <span class="activity-main-text">
                                                                          <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Order Status</span> from <span class="activity-start-status">Processing</span> to <span class="activity-end-status">Ready To Dispatch</span>
                                                                        </span>
                                                                        <span class="activity-time"> 2 months ago</span>
                                                                      </div>
                                                                    </div>

                                                                    <div class="activity-item">
                                                                      <div class="activity-content filter_all">
                                                                        <span class="activity-main-text">
                                                                          <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Order Type</span> from <span class="activity-start-status">New Order</span> to <span class="activity-end-status">Replacement</span>
                                                                        </span>
                                                                        <span class="activity-time"> 2 months ago</span>
                                                                      </div>
                                                                    </div>


                                                                    <div class="activity-item">
                                                                      <div class="activity-content filter_all">
                                                                        <span class="activity-main-text">
                                                                          <a href="#" class="activity-user">Suraj</a> created <span class="activity-status">Order</span>
                                                                        </span>
                                                                        <span class="activity-time"> 2 months ago</span>
                                                                      </div>
                                                                    </div>

                                                                    

                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </aside>

                            
                        </div>
                        <!-- -----MAIN CONTENTS END HERE----- -->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- Modal Start here -->
        <div class="modal fade" id="shipping-edit" role="dialog" aria-labelledby="shipping-edit" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
                <div class="text-center">
                  <h3 class="modal-title text-center">Add Delivery Details </h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form method="POST" action="" class="follow-modal-form" id="shipping-edit">
                  
                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" size="16" class="form-control color-primary-light" name="courier_date" id="courier_date">
                        <label class="control-label">Courier Date<span class="asterix-error"><em>*</em></span></label>
                         <i class="fas fa-calendar-alt"></i>
                     </div>
                       <div class="help-block"></div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="courier_name" id="courier_name" value="" class="form-control  color-primary-light" data-msg="Please Enter Courier Name">
                        <label for="courier_name">Courier Name</label>
                        <i class="fas fa-boxes list-level list-level"></i>
                      </div>
                      <span class="custom-error"></span>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="courier_website" id="courier_website" value="" class="form-control  color-primary-light" data-msg="Please Enter Courier Website">
                        <label for="courier_website">Courier Website</label>
                        <i class="fas fa-globe list-level"></i>
                      </div>
                      <span class="custom-error"></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="awb_no" id="awb_no" value="" class="form-control  color-primary-light" data-msg="Please Enter AWB No">
                        <label for="awb_no">AWB No.</label>
                        <i class="fas fa-cubes list-level"></i>
                      </div>
                      <span class="custom-error"></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="cnf_awb_no" id="cnf_awb_no" value="" class="form-control  color-primary-light" data-msg="Please Enter Confirm AWB No">
                        <label for="cnf_awb_no">Confirm AWB No.</label>
                        <i class="fas fa-cubes list-level"></i>
                      </div>
                      <span class="custom-error"></span>
                    </div>
                  </div>

                

                   

                
                  
                  <div class="clearfix"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn grey" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary btn grey">Remove Shipment</button>
                <input type="submit" class="btn btn-primary btn green" value="Submit" />
              </div>
            </form>
          </div>
        </div>
        <!-- Modal Ends here -->
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <!-- OPTIONAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function(){

                    $("#courier_date").datepicker({ 
                          rtl: App.isRTL(),
                          orientation: "auto bottom",
                          autoclose: true,
                          format: 'yyyy-mm-dd',
                        }).on('changeDate', function(ev) {
                          console.log('in here');
                        $(this).valid();  // triggers the validation test
                          $(this).addClass('edited');
                        // '$(this)' refers to '$("#datepicker")'
                       });
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
