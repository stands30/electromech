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
      text-align: center !important;
    }
    .tr-content > th
    {
      width: 40px;
      text-align: center !important;
    }
    .tbl-head tr.td-content th{
      text-align: center!important;
    }
    /*.remark-custom-details{
      padding-left: 287px;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .remark-custom-details{
          padding-left: 100px;
        }
    }*/
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
      <div class="clearfix"> </div>
        <div class="invoice-content-2 bordered" style="     padding: 0px 0px;    border: 1px solid rgba(0, 0, 0, 0.5);padding: 5px">
          <div class="row invoice-head" style="margin-bottom: 20px;" >
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 0px">
                <div class="company-address" style=" text-align: center!important;">                     
                   <span class="bold uppercase"><?php echo isset($dispatch_order->dor_cmp_id_value) ? $dispatch_order->dor_cmp_id_value:''; ?></span>
                   <br/><?php echo isset($dispatch_order->dor_billing_cmp_address) ? $dispatch_order->dor_billing_cmp_address:''; ?><br/>
                   <span style="float: left;;margin-left: 50px;margin-top: 20px">GRN No: <?php echo isset($dispatch_order->dor_code) ? $dispatch_order->dor_code:''; ?></span>  
                   <div class="company-address " style="padding-top: 0px;float: right;">
                      <img src="<?php echo base_url()?>assets/project/images/grn.png" height="60px" width="80px">
                   </div>
                   <span  style="float: right;margin-right: 50px;;margin-top: 20px">Date: <?php echo isset($dispatch_order->dor_date_format) ? $dispatch_order->dor_date_format:''; ?></span>
                   <span></span>
                </div>
             </div>
             <div>
                <div class="invoice-logo">
                 
                </div>
                
             </div>
          </div>
          <div  class="goods-title" style="background-color: darkblue;color:white;height: 30px;width: 100%;padding-top: 5px;"><center>GOODS RECEIPT NOTE</center></div>
        
          <hr style="border-top: 1px solid #17899f;    margin: 5px 0 10px 0;">
          <div class="row invoice-cust-add" style="margin-bottom: 0px;">
              <div class="col-lg-4 col-md-4 col-xs-4" style="text-align: left;">
                <table class="table " style="    margin-bottom: 0px;">
                   <tbody>
                      <tr style="">
                         <td style="width: 35%;border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">From : </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><?php echo isset($dispatch_order->dor_billing_people_value) ? $dispatch_order->dor_billing_people_value:''; ?><p style="margin: 2px 0;"><?php echo isset($dispatch_order->dor_billing_addr) ? $dispatch_order->dor_billing_addr:''; ?> </p></td>
                      </tr>
                      <tr style="">
                         <td style="width: 35%;border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"></td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> </td>
                      </tr>
                      <tr style="">
                         <td style="width: 35%;border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"></td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> </td>
                      </tr>
                      <tr style="">
                         <td style="width: 35%;border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">To: </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><?php echo isset($dispatch_order->dor_shipping_people_value) ? $dispatch_order->dor_shipping_people_value:''; ?><p style="margin: 2px 0;"> <?php echo isset($dispatch_order->dor_shipping_addr) ? $dispatch_order->dor_shipping_addr:''; ?> </p></td>
                      </tr>
                      
                   </tbody>
                </table>
              </div>
              <div class="col-lg-1 col-md-1 col-xs-1" style="text-align: left;">
              </div>
              <div class="col-lg-7 col-md-7 col-xs-7" style="text-align: left;">
                <table class="table " style="    margin-bottom: 0px;">
                   <tbody>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Delivery Note No :</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">  <?php echo isset($dispatch_order->dor_code) ? $dispatch_order->dor_code:''; ?></td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">Date </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> <?php echo isset($dispatch_order->dor_date_format) ? $dispatch_order->dor_date_format:''; ?></td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Invoice No. </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> <?php echo isset($dispatch_order->dor_invoice) ? $dispatch_order->dor_invoice:''; ?></td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">Date </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><?php echo isset($dispatch_order->dor_invoice_date_format) ? $dispatch_order->dor_invoice_date_format:''; ?></td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Order No</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">Date </td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> <?php echo isset($dispatch_order->dor_date_format) ? $dispatch_order->dor_date_format:''; ?></td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Requisition No.</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> </td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Requisition By.</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;">  </td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Charges Prepaid</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> </td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Charges Collect</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> </td>
                      </tr>
                      <tr style="">
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Transport Name</td>
                         <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;" ><?php echo isset($dispatch_order->dor_transport_name) ? $dispatch_order->dor_transport_name:''; ?></td>
                      </tr>
                   </tbody>
                </table>
              </div>
          </div>
          <?php $tax = false;
               if(isset($dispatch_order->dor_billing_cmp_state) && isset($dispatch_order->dor_cmp_state) && $dispatch_order->dor_billing_cmp_state != '0' && $dispatch_order->dor_cmp_state != '0' ) 
                     {
                       if($dispatch_order->dor_billing_cmp_state == $dispatch_order->dor_cmp_state)
                       {
                          $tax = true;
                       }

                     }
               ?>
          <hr style="border-top: 1px solid #17899f;margin: 0px 0 10px 0;">
          <div class="row">
             <div class="col-lg-12 col-md-12 col-xs-12">
                <table class="table table-bordered table-hover">
                   <thead class="table_color " style="    background: #F9A653!important;    color: white!important;">
                      <tr>
                            <th>Sr. No.</th>
                            <th>Product</th>
                            <th>Description</th>
                             <?php if($product_size == '1') { ?>
                            <th>Variant</th>
                          <?php } ?>
                            <th>Rate</th>
                            <th>Quantity</th>
                             <?php if($product_tax == '1') { ?>
                            <th>Sub-Total</th>
                              <?php 
                              if( $tax_computation == 1 && $dispatch_order->dor_product_tax == '1')
                              { 
                                if($tax == true){ ?>
                                <th>CGST</th>
                                <th>SGST</th>
                                <?php }
                                else
                                 { ?>
                                <th>IGST</th>
                              <?php } 
                              } }
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
                         foreach ($dor_product as $dor_product_key ) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo isset($dor_product_key->dop_prd_id_value) ? $dor_product_key->dop_prd_id_value:'' ?></td>
                            <td><?php echo isset($dor_product_key->dop_desc) ? $dor_product_key->dop_desc:'' ?></td>
                       <?php if($product_size == '1') { ?>
                            <td><?php echo isset($dor_product_key->dop_prv_id_value) ? $dor_product_key->dop_prv_id_value:'' ?></td>
                          <?php } ?>
                            <td><?php echo isset($dor_product_key->dop_rate_format) ? $dor_product_key->dop_rate_format:'' ?></td>
                            <td><?php echo isset($dor_product_key->dop_qty) ? $dor_product_key->dop_qty:'' ?></td>

                              <?php if($product_tax == '1') { ?>
                            <td><?php echo isset($dor_product_key->dop_sub_total_format) ? $dor_product_key->dop_sub_total_format:'' ?>
                            </td>
                          <?php
                             if($dispatch_order->dor_product_tax == '1' && $tax_computation == 1 )
                             {
                              if($tax == true){ 
                                $cgst = number_format($dor_product_key->dop_tax_percent/2,2);
                                $cgst_amt = number_format($dor_product_key->dop_tax/2,2);
                                $sgst = number_format($dor_product_key->dop_tax_percent/2,2);
                                $sgst_amt = number_format($dor_product_key->dop_tax/2,2);
                                ?>
                            <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                               <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                             <?php }
                             else{ ?>
                            <td><?php echo isset($dor_product_key->dop_tax_format) ? $dor_product_key->dop_tax_format:'';
                               echo isset($dor_product_key->dop_tax_percent) ? ' ('.$dor_product_key->dop_tax_percent.'%)':''; ?></td>
                             <?php }
                             } }
                           ?>
                            <td><?php echo isset($dor_product_key->dop_total_format) ? $dor_product_key->dop_total_format:'' ?></td>
                          </tr>
                        <?php $i++; } ?>
                   </tbody>
                </table>
                <hr>
                <div class="table-responsive deatil-table total-table-list">
                  <table class="table table-bordered  flip-content custom-flip-content">
                    <tbody>
                       <?php if($product_tax != '1' ||  $tax_computation == '1') {  ?>
                      <tr>    
                          <td class="text-right">Sub-Total</td>
                          <td class="text-right"><b><?php echo isset($dispatch_order->dor_sub_total_format) ? $dispatch_order->dor_sub_total_format:'' ?></b></td>
                      </tr>
                     <?php }  
                         if($tax_computation == '1' && $dispatch_order->dor_product_tax != '1')
                        {
                          $tax_percent =  isset($dispatch_order->dor_tax_percent) ? $dispatch_order->dor_tax_percent:'';
                          if($tax_percent != ''  && $tax == true)
                          {
                                $cgst = number_format($dispatch_order->dor_tax_percent/2,2);
                                $cgst_amt = number_format($dispatch_order->dor_tax/2,2);
                                $sgst = number_format($dispatch_order->dor_tax_percent/2,2);
                                $sgst_amt = number_format($dispatch_order->dor_tax/2,2);
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
                            <td class="text-right">IGST <?php echo isset($dispatch_order->dor_tax_percent) ? '('.$dispatch_order->dor_tax_percent.'%)':''; ?></td>
                            <td class="text-right"><b><?php echo isset($dispatch_order->dor_tax) ?number_format($dispatch_order->dor_tax,2) :''; ?></b></td>
                           </tr>
                        <?php }
                         }
                          if($tax_computation == 1 && $dispatch_order->dor_product_tax == '1')
                        {
                         ?>
                           <tr>    
                            <td class="text-right">Tax </td>
                            <td class="text-right"><b><?php echo isset($dispatch_order->dor_tax) ? number_format($dispatch_order->dor_tax,2):''; ?></b></td>
                           </tr>
                         <?php } ?>
                      <tr>    
                          <td class="text-right">Total</td>
                          <td class="text-right"><b><?php echo isset($dispatch_order->dor_total_format) ? $dispatch_order->dor_total_format:'' ?></b></td>
                      </tr>
                      
                    </tbody>
                  </table>


                </div>
             </div>

          </div>

          <div class="row">
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Store Officer </label>
               
             </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Name :</label>
                
             </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Signature</label>
                
             </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Designation</label>
           
            </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Date</label>
                     
             </div>
          </div>
          <div class="row">
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Site Incharge </label>
               
             </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Name :</label>
                
             </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Signature</label>
                
             </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Designation</label>
           
            </div>
             <div class="col-md-2 col-lg-2 col-xs-2">
                <label class="control-label">Date</label>
                     
             </div>
          </div>
          <div class="row">
             <div class="col-md-12 col-lg-12 col-xs-12">
                <label class="control-label">Remark:</label>
               
             </div>
          </div>

          <div class="row">
            <div class="col-xs-12 mt-40 print-wrap">
              <a class="btn green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
            </div>
          </div>
        </div>
        <div class="js-scripts">
          <?php $this->load->view('common/footer_scripts'); ?> 
          <!-- OPTIONAL SCRIPTS -->
          <!-- END OPTIONAL SCRIPTS -->
        </div>
      </body>
    </html>
