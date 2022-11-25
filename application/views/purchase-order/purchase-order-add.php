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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/purchase-order/purchase-order-custom.css<?php echo $global_asset_version; ?>">
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- OPTIONAL LAYOUT STYLES -->
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
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <!-- END PAGE HEADER-->
              <!-- START PAGE CONTENT-->
              <div class="container-fluid">

                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center"><?php echo $title; ?></h3>
                  <span class="sp_line color-primary"></span>
                </div>
                  <form role="form" id="custom_module_form" class="col-md-12 form_edit">
                    <div class="row">
                      <!-- Hidden fields -->
                          <div class="form-hidden-area">
                            <input type="text" name="por_id" id="por_id" class="hidden-field module_id por_id">
                            <input type="text" name="por_gst_percent" id="por_gst_percent" class="hidden-field gst_percent" value="<?php echo $tax_percent; ?>">
                            <input type="text" name="por_prod_tax" id="por_prod_tax" class="hidden-field product_tax" value="<?php echo $product_tax; ?>">
                            <input type="text" name="delete_form_prod_id" class="hidden-field delete_form_prod_id" >
                            <input type="text" name="por_billing_cmp_state" id="por_billing_cmp_state" class="hidden-field billing_cmp_state" >
                            <input type="text" name="por_vdr_cmp_state" id="por_vdr_cmp_state" class="hidden-field vdr_cmp_state" value="">
                            <input type="text" name="por_total_old_value" id="por_total_old_value" class="hidden-field por_total_old_value" value="">
                          </div>
                          <!-- Hidden fields -->
                    </div>
                    <div class="row">
                      <div class=" col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Billing Company</label>
                          <div class="input-icon">
                              <i class="fas fa-handshake icon-client list-level"></i>
                              <select type="select" name="por_billing_cmp" id="por_billing_cmp" class="form-control billing_cmp"  required="">
                                <option class="blank_option"></option>
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                        
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Vendor <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-handshake icon-client list-level"></i>
                              <select type="select" name="por_vdr_id" id="por_vdr_id" class="form-contro vdr_cmp"  required="" data-cmp_type="<?php echo COMPANY_CMP_TYPE_VENDOR.','.COMPANY_CMP_TYPE_BOTH; ?>">
                                <option class="blank_option"></option>
                              </select>                                                
                          </div> 
                          <span class="custom-error"></span>                                                                  
                        </div> 
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="por_reference" id="por_reference" value="" class="form-control  color-primary-light">
                            <label for="por_reference"> Reference No</label>
                            <i class="fas fa-id-card list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="por_code" id="por_code" class="form-control  color-primary-light" value="" required="" readonly="">
                            <label for="por_code">Purchase Order No</label>
                            <i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title">Date</label>
                          <div class="input-icon">
                            <input type="text" class="form-control por_date date date-picker" id="por_date" name="por_date" required="" data-msg="Please Select Date" value="" required="">
                            <i class="fa fa-calendar-alt"></i>
                          </div> 
                          <span class="custom-error"></span>                                                               
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="por_subject" id="por_subject" value="" class="form-control  color-primary-light">
                            <label for="por_subject">Subject</label>
                            <i class="fas fa-th-list list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                       <?php $tax_display_none = '';
                          if($tax_computation != '1') { 
                            $tax_display_none = 'element-hide'; }?> 
                          <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label <?php echo $tax_display_none; ?>">
                              <?php  //$tax_checked = 'checked="checked"';
                               // if(isset($quotation->qtn_tax_computation) && $quotation->qtn_tax_computation != '1') {  $tax_checked= ''; } 
                               ?>
                                <div class="md-checkbox input-label-text">
                                    <input type="checkbox" id="por_tax_computation" name="por_tax_computation" class="md-check prod_tax_computation" value="<?php echo ACTIVE_STATUS; ?>"  >
                                    <label for="por_tax_computation">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>Tax Computation</label>
                                </div>
                                                            
                            </div>
                          </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Address</label>
                          <div class="input-icon">
                              <i class="fas fa-map-marker list-level" aria-hidden="true"></i>
                              <select type="select" name="por_address" id="por_address" class="form-control" data-gen-grp="por_address" data-other_addr='<?php echo PURCHASE_ORDER_ADDRESS_OTHER; ?>'>
                                <option>Please Select Address</option>
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>
                      <div class="col-md-6 por_other_address">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <textarea type="textarea" name="por_other_address" id="por_other_address" class="form-control color-primary-light" rows="2" ></textarea>                     
                            <label>Delivery Address</label>
                            <i class="fas fa-map-marker list-level" aria-hidden="true"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row no-side-padding mb-20">
                      <div class="col-md-12">
                        <div class=" repeater-div">
                        <div class="row">
                           <div class="col-md-12">
                             <span class="sub-list-title repeater-list-title">Add Products</span>
                           </div>
                        </div>
                        <div class="row row-repeater repeater repeter-design">
                          <div class="col-md-12 repeter-bg">
                            <div class="mt-repeater">
                              <div data-repeater-list="product_repeater_item">
                                <div class="row product_repeater_item"  data-repeater-item="product_repeater_item" >
                                   <!-- Hidden fields -->
                                <div class="form-hidden-area">
                                  <input type="text" name="pop_id" class="hidden-field prod_unique_id">
                                  <input type="text" name="pop_gst_percent" class="hidden-field prod_gst_percent">
                                </div>
                                <!-- Hidden fields -->
                                  <div class="col-md-12 no-side-padding">
                                    <div class="col-md-4">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                        <label class="drp-title reapeter-drp-title">Product <span class="asterix-error"><em>*</em></span></label>
                                        <div class="input-icon">    
                                          <!-- <i class="fa fa-cart-plus list-level"></i>                                     -->
                                            <select name="pop_prd_id" class="form-control form-repeater-data  prod_id"  required="">
                                              <option class="blank_option"></option>                                      
                                            </select>                                                
                                        </div> 
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon input-label-text">
                                          <textarea name="pop_prd_desc" class="form-control repeater-textarea color-primary-light prod_desc" rows="1" ></textarea>                     
                                          <label class="repeater-label">Description <span class="asterix-error"><em>*</em></span></label>
                                          <!-- <i class="fa fa-comments" aria-hidden="true"></i> -->
                                        </div>
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                     <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">  
                                       
                                        <div class="input-icon input-label-text">
                                          <input type="text" name="pop_category" class="form-control repeater-text  color-primary-light prod_make prd_category" data-msg="Please Enter Make" readonly="">
                                          <label class="repeater-label" for="pop_category">Make </label> 
                                          <span class="custom-error"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon input-label-text">
                                          <input type="text" name="pop_hsn" class="form-control repeater-text  color-primary-light prod_hsn prd_hsn_code" data-msg="Please Enter HSN Code" readonly="">
                                          <label class="repeater-label" for="prd_hsn_code">HSN </label>
                                          <span class="custom-error"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-12 no-side-padding">
                                    <?php if($product_size == '1') { ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">  
                                         <label class="drp-title">Variant <span class="asterix-error"><em>*</em></span></label>
                                        <div class="input-icon">
                                            <select name="pop_prv_id" class="form-control pop_prv_id custom-select2 prod_variant" required="" data-msg="Please Select Variant">
                                              <option class="blank_option"></option>                                      
                                            </select>
                                        </div>
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">  
                                         <label class="drp-title">GST <span class="asterix-error"><em>*</em></span></label>
                                        <div class="input-icon">
                                            <select name="pop_gst_id" class="form-control  custom-select2 pop_gst_id" required="" data-msg="Please Select GST" data-gen-grp="product_gst_percent">
                                              <option class="blank_option"></option>                                      
                                            </select>
                                        </div>
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="pop_price"  value="" class="form-control repeater-text  color-primary-light prod_rate numeric-decimal-format">
                                            <label  class="repeater-label" for="pop_price">Rate <span class="asterix-error"><em>*</em></span></label>
                                           <!-- <i class="fas fa-balance-scale list-level"></i> -->
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="pop_qty" value="" class="form-control repeater-text  color-primary-light prod_qty numeric-format" required="">
                                            <label  class="repeater-label" for="pop_qty">Quantity <span class="asterix-error"><em>*</em></span></label>
                                           <!-- <i class="fas fa-balance-scale list-level"></i> -->
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <?php if($product_tax == '1') { ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Sub Total</label>
                                          <br>
                                          <span class="prod_sub_total_span bold">0.00</span>
                                          <input type="text" name="pop_sub_total"  class="order-hidden-fields prod_sub_total">
                                        </div> 
                                        <span class="custom-error"></span>                   
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Tax</label>
                                          <br>
                                          <span class="prod_tax_span bold">0.00</span> <span class="prod_tax_percent_span"></span>
                                          <input type="text" name="pop_gst"  class="order-hidden-fields prod_tax" >
                                        </div> 
                                        <span class="custom-error"></span>                    
                                      </div>
                                    </div>
                                  <?php } ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Total</label>
                                          <br>
                                          <span class="pr bold prod_total_span">0.00</span>
                                          <input type="text" name="pop_total" class="order-hidden-fields prod_total" >
                                        </div>  
                                        <span class="custom-error"></span>                  
                                      </div>
                                    </div>
                                    
                                   
                                  </div>
                                  <div class="col-md-12 no-side-padding">
                                    <div class="col-md-2 cross delete-repeater delete-repeater-custom">
                                      <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row btn-row">
                              <div class="col-md-2 ">
                                <div class="form-group ">
                                    <a href="javascript:;" class="bold" data-repeater-create="">
                                    Add More&nbsp;<i class="fa fa-plus "></i> </a>                           
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      </div>
                    </div>

                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Sub Total</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_sub_total_span"><?php echo isset($purchase_order->por_sub_total_format) ? $purchase_order->por_sub_total_format:'0.00'; ?></span>
                         
                      </div>
                    </div>

                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Tax <span class="form_gst_percent_span"><?php echo ($product_tax != '1') ? '('.$tax_percent.' %)':''; ?></span></label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_gst_span"><?php echo isset($purchase_order->por_gst_format) ? $purchase_order->por_gst_format:'0.00'; ?></span>
                         
                      </div>
                    </div>

                    <div class="row row-qout ">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Total</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class="bold cal-value form_total_span"><?php echo isset($purchase_order->por_total_format) ? $purchase_order->por_total_format:'0.00'; ?></span>
                         
                      </div>
                    </div>

                    <div class="form-hidden-area">
                      <input type="text" name="por_sub_total" id="por_sub_total" class="order-hidden-fields form_sub_total">
                      <input type="text" name="por_gst" id="por_gst" class="order-hidden-fields form_gst">
                      <input type="text" name="por_total" id="por_total" class="order-hidden-fields form_total ">
                    </div> 
                     <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-12">
                             <span class="sub-list-title repeater-list-title">Terms & Condition</span>
                           </div>
                        </div>
                        <div class="row row-repeater  repeter-design mb-40">
                          <div class="col-md-12 repeter-bg">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">  
                                 <label class="drp-title">Tax</label>
                                  <div class="input-icon">
                                    <i class="fas fa-id-card list-level"></i>
                                      <select name="por_tnc_tax" id="por_tnc_tax" type="select" class="form-control por_tnc_tax custom-select2"  data-gen-grp="po_tax" data-msg="Please Select Tax">                                            
                                        <option class="blank_option"></option>
                                      </select>
                                      <span class="custom-error"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon input-label-text">
                                      <input type="text" name="por_tnc_price" id="por_tnc_price" class="form-control color-primary-light" data-msg="Please Enter For Price">
                                      <label for="por_tnc_price">For Price</label>
                                      <i class="fas fa-coins list-level"></i>
                                      <span class="custom-error"></span> 
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon input-label-text">
                                      <input type="text" name="por_tnc_warranty" id="por_tnc_warranty" class="form-control color-primary-light" data-msg="Please Enter For Warranty">
                                      <label for="por_tnc_warranty">Warranty</label>
                                      <i class="fas fa-address-card list-level"></i>
                                      <span class="custom-error"></span> 
                                    </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                  <div class="input-icon input-label-text">
                                    <input type="text" name="por_tnc_payment" id="por_tnc_payment" class="form-control color-primary-light" data-msg="Please Enter For Price">
                                    <label for="por_tnc_payment">Payment</label>
                                    <i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>
                                    <span class="custom-error"></span> 
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon input-label-text">
                                      <input type="text" name="por_tnc_delivery_period" id="por_tnc_delivery_period" class="form-control color-primary-light" data-msg="Please Enter Delivery Period">
                                      <label for="por_tnc_delivery_period">Delivery Period</label>
                                      <i class="fas fa-truck list-level"></i>
                                      <span class="custom-error"></span> 
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">  
                                 <label class="drp-title">Foreign</label>
                                  <div class="input-icon">
                                      <i class="fas fa-exchange-alt list-level"></i>
                                      <select name="por_tnc_foreign" id="por_tnc_foreign" type="select" class="form-control por_tnc_foreign custom-select2"   data-gen-grp="por_tnc_foreign" data-msg="Please Select Foreign">                 
                                        <option class="blank_option"></option>
                                      </select>
                                      <span class="custom-error"></span>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">  
                                 <label class="drp-title">Test Certificate (TC)</label>
                                  <div class="input-icon">
                                      <i class="fas fa-file-invoice color-dark-green list-level"></i>
                                      <select name="por_tnc_tc" id="por_tnc_tc" type="select" class="form-control por_tnc_tc custom-select2"   data-gen-grp="por_tnc_tc" data-msg="Please Select Foreign">                            
                                        <option class="blank_option"></option>
                                      </select>
                                      <span class="custom-error"></span>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                  <div class="input-icon input-label-text">
                                    <input type="text" name="por_tnc_delivery_time" id="por_tnc_delivery_time" class="form-control color-primary-light timepicker" data-msg="Please Enter For Price">
                                    <label for="por_tnc_delivery_time">Delivery Time</label>
                                    <i class="fas fa-clock list-level"></i>
                                    <span class="custom-error"></span> 
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                  <div class="input-icon">
                                    <textarea type="textarea" class="form-control " id="por_tnc_remark" name="por_tnc_remark" rows="3" placeholder=""></textarea>       
                                    <label>Remark</label> 
                                    <i class="fa fa-comment list-level"></i>
                                  </div>
                                  <span class="custom-error"></span>
                                </div>
                              </div>
                             
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                 
                    <div class="row mb-40">
                      <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <textarea type="textarea" class="form-control " id="por_remark" name="por_remark" rows="2" placeholder=""></textarea>       
                              <label>Additional Remark</label> 
                              <i class="fa fa-comment list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group fileinput fileinput-new" data-provides="fileinput" style="">
                              <label>Attachments 
                                <a href="#" data-toggle="tooltip" title="" class="data-tooltip-user" data-original-title="You can add multiple images with .png .jpg &amp; .jpeg file format"><span><i class="fa fa-info-circle"></i></span></a>
                              </label>                          
                              <div class="image-preview" style="padding-left: 0px;margin-top: 0px;">
                                <div id="image_preview" class=""></div>
                                  <span class="btn default btn-file btn-file-view">
                                    <input type="file" name="por_document[]" id="por_document" class="component-image btn-file-view" multiple=""> 
                                    <span class="error"></span>
                                  </span>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
              <?php $view_type = isset($purchase_order->por_id) ? '':VIEW_TYPE_ADD;  ?>
              <?php $this->load->view('common/footer-buttons',array('view_type' => $view_type)); ?>   
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <!-- OPTIONAL SCRIPTS -->
        <script type="text/javascript">
          $("#por_date").datepicker({ 
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
            var product_repeater_item     = <?php echo isset($por_product) ? json_encode($por_product):'[]'; ?>;
          $(document).ready(function(){
              var purchase_order_data = <?php echo isset($purchase_order) ? json_encode($purchase_order):'{}'; ?>;
              $('#por_terms').summernote({
              height:300,
              // focus:true,
           });
             
            displayFieldData('#custom_module_form',purchase_order_data);
            $('#por_address').change(function(){
              displayOtherAddress(this);
            });
            displayOtherAddress($('#por_address'));
          });

        </script>
        <script src="<?php echo base_url(); ?>assets/module/purchase-order/purchase-order-form.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </div>
</body>
</html>
