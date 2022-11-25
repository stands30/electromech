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
  <style type="text/css">
    .add-inv-wrap{
      text-align: right;
    }
    .table td:nth-child(odd){
      background-color: transparent !important;
    }
    .receipt-wrap p{
      margin-top: 2px;
      margin-bottom: 2px;
    }
    .print-wrap{
      text-align: right;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
     padding: 8px !important;
    }
    .tbl-head {
      background: #1f1c1c!important; 
      color: white!important;
      -webkit-print-color-adjust: exact; 
    }
    .bill-details{
      padding-left: 30px !important;
      padding-right: 15px !important;
    }
    .inner-left{
      text-align: justify;
    }
    .inner-right{
      text-align: right;
    }
    .td-content > td
    {
      text-align: center;
    }
    .tr-content > th
    {
      width: 40px;text-align: center;
    }
    .fas.fa-rupee-sign{
      color: #333!important;
    }
  </style>
  <head>
    <?php $this->load->view('common/header_styles'); ?> 
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" media="print" />    
    <!-- END OPTIONAL LAYOUT STYLES -->  
  </head>
  <body>
    <div class="invoice-content-2 bordered" style="     padding: 0px 0px;    border: 1px solid rgba(0, 0, 0, 0.5);padding: 5px">
            <div class="row invoice-head" style="margin-bottom: 10px;" >
               <div class="col-xs-12 text-right">
                  <?php 
                  $cmp_logo = base_url().getLogo();;
                  if(isset($dispatch_order->dor_billing_cmp_logo) && $dispatch_order->dor_billing_cmp_logo !=''){
                    $cmp_logo =base_url().COMPANY_LOGO.$dispatch_order->dor_billing_cmp_logo;
                  } ?>
                  
                    <img src="<?php echo $cmp_logo; ?>" style="">
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <h4 class="bold" style="color:#7e8691 ;">P.O. No.: <?php echo isset($purchase_order->por_code) ? $purchase_order->por_code:'' ?></h4>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                  <h4 class="bold" style="color: #7e8691;">Date: <?php echo isset($purchase_order->por_date_format) ? $purchase_order->por_date_format:'' ?></h4>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0px">
                  <div class="company-address" style="text-align: left!important;">
                     <img class="txtarea3" style="width: 250px;padding-bottom: 0px"  src="<?php echo base_url()?>logo_image/nextasy_1.png"   alt="" /> 
                     <span class="bold uppercase"><?php echo isset($purchase_order->por_vdr_id_value) ? $purchase_order->por_vdr_id_value:'' ?></span>
                     <br/><div style="max-width: 300px;"> <?php echo isset($purchase_order->por_billing_cmp_address) ? $purchase_order->por_billing_cmp_address:'' ?></div>
                  </div>
               </div>
              
            </div>
            <?php $tax = false;
                 if(isset($purchase_order->por_billing_cmp_state) && isset($purchase_order->por_vdr_cmp_state) && $purchase_order->por_billing_cmp_state != '0' && $purchase_order->por_vdr_cmp_state != '0' ) 
                       {
                         if($purchase_order->por_billing_cmp_state == $purchase_order->por_vdr_cmp_state)
                         {
                            $tax = true;
                         }

                       }
                 ?>
         
            <div class="row">
               <div class="col-lg-12 col-md-12 col-xs-12">
                  <p style="font-weight: bold;text-decoration: underline;margin:5px 0;"><?php echo isset($purchase_order->por_subject) ? $purchase_order->por_subject:'' ?></p>
           <p style="font-weight: bold;margin:5px 0;">Ref No.: <?php echo isset($purchase_order->por_code) ? $purchase_order->por_code:'' ?></p>
                  <p style="margin-bottom: 5px;"> Dear sir,</p>
                  <p style="margin-top: 5px;"> We are pleased to place the purchase Order on you as follows:</p>
                  <table class="table table-bordered table-hover">
                     <thead class="table_color " style=" ">
                        
                        <tr>
                            <th>Sr. No.</th>
                            <th>Product</th>
                            <th>Description</th>
                        <?php if($product_size == '1') { ?>
                            <th>Variant</th>
                          <?php } ?>
                            <th>Rate</th>
                            <th>Total Qty</th>
                            <th>Received Qty</th>
                            <?php if($product_tax == '1') { ?>
                            <th>Sub-Total</th>
                          <?php 
                              if( $tax_computation == 1 && $purchase_order->por_prod_tax == '1')
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
                      
                      <?php $i=1;
                         $cgst =0;
                         $cgst_amt=0;
                         $sgst =0;
                         $sgst_amt=0;
                         foreach ($por_product as $por_product_key ) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo isset($por_product_key->pop_prd_id_value) ? $por_product_key->pop_prd_id_value:'' ?></td>
                            <td><?php echo isset($por_product_key->pop_prd_desc) ? $por_product_key->pop_prd_desc:'' ?></td>
                       <?php if($product_size == '1') { ?>
                            <td><?php echo isset($por_product_key->pop_prv_id_value) ? $por_product_key->pop_prv_id_value:'' ?></td>
                          <?php } ?>
                            <td><?php echo isset($por_product_key->pop_price_format) ? $por_product_key->pop_price_format:'' ?></td>
                            <td><?php echo isset($por_product_key->pop_qty) ? $por_product_key->pop_qty:'' ?></td>
                            <td><?php echo isset($por_product_key->pop_received_qty) ? $por_product_key->pop_received_qty:'' ?></td>
                          <?php if($product_tax == '1') { ?>
                            <td><?php echo isset($por_product_key->pop_sub_total_format) ? $por_product_key->pop_sub_total_format:'' ?>
                            </td>
                          <?php
                             if($purchase_order->por_prod_tax == '1' && $tax_computation == 1 )
                             {
                              if($tax == true){ 
                                $cgst = number_format($por_product_key->pop_gst_percent/2,2);
                                $cgst_amt = number_format($por_product_key->pop_gst/2,2);
                                $sgst = number_format($por_product_key->pop_gst_percent/2,2);
                                $sgst_amt = number_format($por_product_key->pop_gst/2,2);
                                ?>
                            <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                               <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                             <?php }
                             else{ ?>
                            <td><?php echo isset($por_product_key->pop_gst_format) ? $por_product_key->pop_gst_format:'';
                               echo isset($por_product_key->pop_gst_percent) ? ' ('.$por_product_key->pop_gst_percent.'%)':''; ?></td>
                             <?php }
                             } }
                           ?>
                            <td><?php echo isset($por_product_key->pop_total_format) ? $por_product_key->pop_total_format:'' ?></td>
                          </tr>
                        <?php $i++; } ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-md-8 col-xs-8">
                  <div class="">
                     <address>
                        <strong style="text-decoration: underline;margin-bottom:4px;display: inline-block;">Terms & Conditions:</strong>
                        <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Tax:</strong> <?php echo isset($purchase_order->por_tnc_tax_value) ? $purchase_order->por_tnc_tax_value:'' ?>
             <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">FOR Price:</strong>  <?php echo isset($purchase_order->por_tnc_price) ? $purchase_order->por_tnc_price:'' ?>
              <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Warranty:</strong> <?php echo isset($purchase_order->por_tnc_warranty) ? $purchase_order->por_tnc_warranty:'' ?>
                        <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Payment:</strong><?php echo isset($purchase_order->por_tnc_payment) ? $purchase_order->por_tnc_payment:'' ?> 
                        <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Delivery Period:</strong> <?php echo isset($purchase_order->por_tnc_delivery_period) ? $purchase_order->por_tnc_delivery_period:'' ?> 
            <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Delivery Time:</strong> <?php echo isset($purchase_order->por_tnc_delivery_time) ? $purchase_order->por_tnc_delivery_time:'' ?> 
                        <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Foreign:</strong> <?php echo isset($purchase_order->por_tnc_foreign_value) ? $purchase_order->por_tnc_foreign_value:'' ?> 
                        <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;"> TC:</strong><?php echo isset($purchase_order->por_tnc_tc_value) ? $purchase_order->por_tnc_tc_value:'' ?>
             <br/><strong style="width: 100px;margin-bottom:4px;display: inline-block;">Remarks:</strong><?php echo isset($purchase_order->por_tnc_remark) ? $purchase_order->por_tnc_remark:'' ?>
                     </address>
                     <!-- <div class="info">
                        <p style="margin: 5px 0;"><strong>Electromech GST No. 27AAACE9213A1Z5</strong></p>
                        <p style="margin: 5px 0;"><strong>Please Send the Test certificates along with your Invoice to our Mumbai Office</strong></p>
                     </div> -->
                   
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-xs-4 invoice-block" style="float: right;">
                  <table class="table " style="    margin-bottom: 0px;">
                     <tbody>
                        
                         <?php if($product_tax != '1' ||  $tax_computation == '1') {  ?>
                        <tr>    
                            <td class="text-right">Sub-Total</td>
                            <td class="text-right"><b><?php echo isset($purchase_order->por_sub_total_format) ? $purchase_order->por_sub_total_format:'' ?></b></td>
                        </tr>

                      <?php }  
                           if($tax_computation == '1' && $purchase_order->por_prod_tax != '1')
                          {
                            $tax_percent =  isset($purchase_order->por_gst_percent) ? $purchase_order->por_gst_percent:'';
                            if($tax_percent != ''  && $tax == true)
                            {
                                  $cgst = number_format($purchase_order->por_gst_percent/2,2);
                                  $cgst_amt = number_format($purchase_order->por_gst/2,2);
                                  $sgst = number_format($purchase_order->por_gst_percent/2,2);
                                  $sgst_amt = number_format($purchase_order->por_gst/2,2);
                           ?>
                               <tr>    
                                <td class="text-right">CGST <?php echo isset($cgst) ? '('.$cgst.'%)':''; ?></td>
                                <td class="text-right"><b><?php echo isset($cgst_amt) ? $cgst_amt:''; ?></b></td>
                               </tr>
                               <tr>    
                                <td class="text-right">SGST <?php echo isset($sgst) ? '('.$sgst.'%)':''; ?></td>
                                <td class="text-right"><b><?php echo isset($sgst_amt) ? $sgst_amt:''; ?></b></td>
                               </tr>
                          <?php }else{ ?>
                             <tr>    
                              <td class="text-right">IGST <?php echo isset($purchase_order->por_gst_percent) ? '('.$purchase_order->por_gst_percent.'%)':''; ?></td>
                              <td class="text-right"><b><?php echo isset($purchase_order->por_gst) ?number_format($purchase_order->por_gst,2) :''; ?></b></td>
                             </tr>
                          <?php }
                           }
                            if($tax_computation == 1 && $purchase_order->por_prod_tax == '1')
                          {
                           ?>
                             <tr>    
                              <td class="text-right">Tax </td>
                              <td class="text-right"><b><?php echo isset($purchase_order->por_gst) ? number_format($purchase_order->por_gst,2):''; ?></b></td>
                             </tr>
                           <?php } ?>


                        <tr>    
                            <td class="text-right">Total</td>
                            <td class="text-right"><b><?php echo isset($purchase_order->por_total_format) ? $purchase_order->por_total_format:'' ?></b></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="">
                     <div class="row" style="margin-top: 5px;border-bottom:1px solid #212121;border-top:1px solid #212121;">
                        <div class="col-xs-6 no-padding" style="border-right:1px solid #212121;">
                           <div class="col-xs-12 text-left">
                              <strong>Billing Address:</strong>
                           </div>      
                           <div class="col-xs-12"><p style="margin: 2px 0;"> <?php echo isset($purchase_order->por_billing_cmp_value) ? $purchase_order->por_billing_cmp_value:'' ?> </p><p style="margin: 2px 0;"> <?php echo isset($purchase_order->por_billing_cmp_address) ? $purchase_order->por_billing_cmp_address:'' ?> </p> <p style="margin: 5px 0;"><strong> GST No.  <?php echo isset($purchase_order->por_gst) ? $purchase_order->por_gst:'' ?></strong></p><p style="margin: 2px 0;"></p></div>
                        </div>
                        
                        <div class="col-xs-6 no-padding" style="border-right:1px solid #212121;">
                           <div class="col-xs-12 text-left">
                              <strong>Consignee/Delivery Address:</strong>
                           </div>                
                           <div class="col-xs-12"><p style="margin: 2px 0;">  </p><p style="margin: 2px 0;"><?php echo isset($purchase_order->por_vdr_id_value) ? $purchase_order->por_vdr_id_value:'' ?>
                           <br> <?php if(isset($purchase_order->por_address) && $purchase_order->por_address != PURCHASE_ORDER_ADDRESS_OTHER)
                           { 
                            echo $purchase_order->por_address_value;
                           } 
                           else 
                           {
                            echo isset($purchase_order->por_other_address) ? $purchase_order->por_other_address:''; 
                           }
                           ?></p> <p style="margin: 5px 0;"><strong> </strong></p><p style="margin: 2px 0;"> </p></div>
                        </div>
                     </div>   
                     <p style="margin: 2px 0;">Kindly acknowledge the receipt of this purchase order duly signed and stamped as token of your unconditional acceptance</p>                
                     <div class="greet">
                        <p style="margin-bottom: 1px;">Yours truly,</p>
                        <p style="margin-top:0 "><strong>For <?php echo isset($purchase_order->por_billing_cmp_value) ? $purchase_order->por_billing_cmp_value:'' ?></strong></p>
                        <p>  <?php echo isset($purchase_order->por_crdt_by_name) ? $purchase_order->por_crdt_by_name:'' ?></p>
                     </div>
                  </div>
               </div>
            </div>
      <div class="row">
        <div class="col-xs-12 mt-40 print-wrap">
            <a class="btn green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
        </div>
      </div>
    
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
