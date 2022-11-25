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
     padding: 8px!important;
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
      <div class="">
           
                <div class="invoice-content-2 bordered" style="     padding: 0px 0px;    border: 1px solid rgba(0, 0, 0, 0.5);padding: 5px">
                   <div class="row invoice-head" style="margin-bottom: 20px;" >
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0px">
                         <div class="company-address" style="    text-align: left!important;">
                            <br/>
                             <?php /* <div style="max-width: 300px;"><?php echo $dispatch_order['ord_rfr_cli_name']; ?> </div>
                            <br/><div style="max-width: 300px;"><?php echo $dispatch_order['ord_rfr_addr']; ?> </div> <br/>
                            Tel: <?php echo $dispatch_order['ord_rfr_mob_no']; ?><br/>
                            Email Id: <?php echo $dispatch_order['ord_rfr_email_id']; ?> */?>
                         </div>
                      </div>
                      <div class="col-xs-6 text-right">
                         <br/>
                         <?php 
                        $cmp_logo = base_url().getLogo();;
                        if(isset($dispatch_order->dor_billing_cmp_logo) && $dispatch_order->dor_billing_cmp_logo !=''){
                          $cmp_logo =base_url().COMPANY_LOGO.$dispatch_order->dor_billing_cmp_logo;
                        } ?>
                        
                          <img src="<?php echo $cmp_logo; ?>" style="">
                        
                         <!-- <img src="<?php echo base_url()?>assets/img/logo.png"> -->
                         <br/>
                         <p style="text-align: justify;float: right;">
                          <?php echo isset($dispatch_order->dor_cmp_id_value) ? $dispatch_order->dor_cmp_id_value:''; ?><br><?php echo isset($dispatch_order->dor_billing_cmp_address) ? $dispatch_order->dor_billing_cmp_address:''; ?><br>
                            Tel : 22- 28739560/ 28714555<br/> 
                            Email : <?php echo isset($dispatch_order->dor_billing_cmp_website) ? $dispatch_order->dor_billing_cmp_website:''; ?><br/>
                          GST : <?php echo isset($dispatch_order->dor_billing_cmp_gst_no) ? $dispatch_order->dor_billing_cmp_gst_no:''; ?><br/></p>
                      </div>
                   </div>
                   <h2 class="text-center">Delivery Order\Challan</h2>
                <hr>
                <div class="row invoice-cust-add" style="margin-bottom: 0px;">
                   <div class="col-lg-6 col-md-6 col-xs-6" style="text-align: left;">                  
                      <table class="table " style="    margin-bottom: 0px;">
                         <tbody>
                           
                            <tr style="">
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Dipatch/Delivery No: </td>
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><strong><?php echo isset($dispatch_order->dor_code) ? $dispatch_order->dor_code:''; ?></strong> </td>
                            </tr>
                             <tr style="">
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Work Order No. : </td>
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><strong><?php echo isset($dispatch_order->dor_code) ? $dispatch_order->dor_code:''; ?> dated <?php echo isset($dispatch_order->dor_date_format) ? $dispatch_order->dor_date_format:''; ?></strong> </td>
                            </tr>
                           <tr style="">
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> E-Way Bill No. : </td>
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><strong> </strong></td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-lg-1 col-md-1 col-xs-1" style="text-align: left;">
                   </div>
                   <div class="col-lg-5 col-md-5 col-xs-5" style="text-align: left;">
                      <table class="table " style="    margin-bottom: 0px;">
                         <tbody>
                            <tr style="">
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"> Dispatch/Delivery Date </td>
                               <td style="border-top: 0px solid #e7ecf1;   padding-bottom: 5px;padding-top: 5px;"><strong> <?php echo isset($dispatch_order->dor_date_format) ? $dispatch_order->dor_date_format:''; ?></strong> </td>
                            </tr>
                           
                           
                         </tbody>
                      </table>
                   </div>
                </div>
                <div class="row" style="margin-top: 20px;border-bottom:1px solid #212121;border-top:1px solid #212121;">
                   <div class="col-xs-6 no-padding"  style="border-right:1px solid #212121;">
                      <div class="col-xs-12 text-left">
                         <strong>Billed to:</strong>
                      </div>                  
                      <div class="col-xs-9"><p style="margin: 2px 0;"><?php echo isset($dispatch_order->dor_billing_people_value) ? $dispatch_order->dor_billing_people_value:''; ?> </p><p style="margin: 2px 0;"><?php echo isset($dispatch_order->dor_billing_addr) ? $dispatch_order->dor_billing_addr:''; ?> </p><p style="margin: 2px 0;"> GST:<?php echo isset($dispatch_order->dor_billing_gst) ? $dispatch_order->dor_billing_gst:''; ?>  </p></div>
                   </div>
                   
                   <div class="col-xs-6 no-padding"  style="border-right:1px solid #212121;">
                      <div class="col-xs-12 text-left">
                         <strong>Shipped to:</strong>
                      </div>                  
                      <div class="col-xs-9"><p style="margin: 2px 0;"> <?php echo isset($dispatch_order->dor_shipping_people_value) ? $dispatch_order->dor_shipping_people_value:''; ?> </p><p style="margin: 2px 0;"><?php echo isset($dispatch_order->dor_shipping_addr) ? $dispatch_order->dor_shipping_addr:''; ?> </p><p style="margin: 2px 0;"> GST:<?php echo isset($dispatch_order->dor_shipping_gst) ? $dispatch_order->dor_shipping_gst:''; ?>  </p></div>
                   </div>
                </div>
                <hr>
                <?php $tax = false;
               if(isset($dispatch_order->dor_billing_cmp_state) && isset($dispatch_order->dor_cmp_state) && $dispatch_order->dor_billing_cmp_state != '0' && $dispatch_order->dor_cmp_state != '0' ) 
                     {
                       if($dispatch_order->dor_billing_cmp_state == $dispatch_order->dor_cmp_state)
                       {
                          $tax = true;
                       }

                     }
               ?>
                <div class="row">
                   <div class="col-lg-12 col-md-12 col-xs-12">
                      <table class="table table-bordered table-hover">
                         <thead class="table_color " style="    background: #1f1c1c!important;    color: white!important;">
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
                   </div>

                </div>
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

                <table class="table" style="border: 1px solid black;">
                   <tbody style="border: 1px solid black;">
                      <tr style="border: 1px solid black;">
                         <td style="border: 1px solid black;">Transporter Name : <?php echo isset($dispatch_order->dor_transport_name) ? $dispatch_order->dor_transport_name:''; ?></td>
                         <td style="border: 1px solid black;">Vehicle Number :</td>
                      </tr>
                      <tr style="border: 1px solid black;">
                         <td style="border: 1px solid black;">Contact Person Name :  </td>
                         <td style="border: 1px solid black;">Contact No: </td>
                      </tr>
                      <tr style="border: 1px solid black;">
                         <td style="border: 1px solid black;">LR No : <?php echo isset($dispatch_order->dor_lr_no) ? $dispatch_order->dor_lr_no:''; ?> </td>
                         <td style="border: 1px solid black;"> </td>
                      </tr>
                   </tbody>
                  
                </table>
                <div class="row">
                  
                   <div class="col-lg-12 col-md-12 col-xs-12 invoice-block" style="">
                      
                      <div class="greet" style="margin-top: 60px;text-align: right;">
                         <p><strong>For  <?php echo isset($dispatch_order->dor_cmp_id_value) ? $dispatch_order->dor_cmp_id_value:''; ?></strong></p>
                        
                      </div>
                   </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 mt-40 print-wrap">
                    <a class="btn green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                  </div>
                </div>
              </div>
              <!-- MAIN CONTENTS END HERE --> 
              </div>
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
