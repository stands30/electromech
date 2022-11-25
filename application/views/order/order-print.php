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
     padding: 8px 0px 8px 0 !important;
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
    .shipping-to{
      font-size: 18px;
      font-weight: 800;
      line-height: 25px;
      margin-top: 0px;
    }
    /*.remark-custom-details{
      padding-left: 287px;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .remark-custom-details{
          padding-left: 100px;
        }
    }*/
    .table-billing-add tr td{
      border-top: none!important;
      padding-bottom: 0px!important;
    }
    .order-no-details h2{
      margin-top: 10px;
      margin-bottom: 6px;
      font-size: 20px;
      font-weight: 600;
    }
    .order-no-details p,
    .company-heading{
      margin: 10px 0px;
    }
    h3.declaration-content{
      margin-top: 0px;
      font-size: 20px;
      font-weight: 600;
    }
    .tearm-condition{
      margin: 0px;
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
    <!-- BEGIN CONTAINER -->
      <!-- BEGIN CONTENT -->
        <!-- BEGIN CONTENT BODY -->
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet light" style="margin-bottom: 0px;">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- MAIN CONTENTS START HERE  -->
                <header>
                  <div class="row">
                    <div class="col-md-12">
                      <p>Shipped To:</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h1 class="shipping-to">Amazon Bom-1</h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h1 class="shipping-to">Amazon Seller Services Private Limited Prathamesh Complex, Building No. H, Opp. Vatika Restaurant Mumbai - Nasik Highway No. 3, Bhiwandi By-pass Road Bhiwandi, Maharashtra 421302</h1>
                    </div>
                  </div>

                  <hr style="border-top: 1px solid #e7ecf1; margin: 5px 0 10px 0;">
                  <div class="col-md-12 order-no-details">
                    <h2 class="">Order ID : ORD15378</h2>
                    <p>Thank you for buying from Dr.Patkar's.</p>
                  </div>

                  <div class="col-md-12" style="border: 1px solid #e7ecf1;margin-bottom: 20px;">
                    <table class="table table-billing-add" style=" margin-bottom: 0px;">
                      <tbody>
                        <tr>
                          <td width="50%" style="border-bottom:none;"><b>Billing address:</b></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="50%">Amazon Bom-1</td>
                          <td><b>Order Date:</b></td>
                          <td>2019-06-01</td>
                        </tr>
                        <tr>
                          <td width="50%" rowspan="2">
                            Amazon Seller Services Private Limited Prathamesh Complex, Building No. H, Opp. Vatika Restaurant Mumbai - Nasik Highway No. 3, Bhiwandi By-pass Road Bhiwandi, Maharashtra 421302
                          </td>
                          <td><b>Seller Name:</b></td>
                          <td>Sachin Jadhav</td>
                        </tr>
                        <tr>
                          <td><b>Buyer Name:</b></td>
                          <td>Amazon Bom-1</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-12" style="border: 1px solid #e7ecf1;margin-bottom: 20px;">
                    <table class="table table-billing-add" style=" margin-bottom: 0px;">
                      <tbody>
                        <tr>
                          <td width="50%" style=""><b>Dr.Patkar's address:</b></td>
                        </tr>
                        <tr>
                          <td width="50%" style="">OFFICE 104, THAKKAR HEIGHTS, OPP. CEAT TYERS, SUBHASH NAGAR, NAHUR (W) MUMBAI 400078 IN</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                 

                 
                </header>
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                        <tr class="td-content">
                          <th> Sr. No.</th>
                          <th>Product Detail</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="td-content">
                          <td>1</td>
                          <td>Dr. Patkar's Concentrated Mineral Drop</td>
                          <td>476.19</td>
                          <td>10</td>
                          <td>4,761.90</td>
                        </tr>
                        <tr class="td-content">
                          <td>2</td>
                          <td>Dr. Patkar's Apple Cider Vinegar with Ginger Turmeric and Fenugreek (500ml)</td>
                          <td>825.89</td>
                          <td>24</td>
                          <td>19,821.43</td>
                        </tr>
                      </tbody>
                      <tfoot >
                        <tr class="td-content">
                          <td colspan="3"></td>
                          <td><b>ORDER TOTAL</b></td>
                          <td>6744.33</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                
                <div class="col-md-12" style="border: 1px solid #e7ecf1;margin-bottom: 20px;">
                  <strong><p class="company-heading">Thanks for buying on Dr.Patkar's Marketplace.</p></strong>
                </div>

                <div class="col-md-12 no-side-padding">
                  <h3 class="declaration-content">Declaration Letter To Whomsoever It May Concern</h3>
                </div>
                
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                        <tr class="td-content">
                          <th>Quantity</th>
                          <th>Product Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="td-content">
                          <td>10</td>
                          <td>Dr. Patkar's Concentrated Mineral Drop</td>
                        </tr>
                        <tr class="td-content">
                          <td>24</td>
                          <td>Dr. Patkar's Apple Cider Vinegar with Ginger Turmeric and Fenugreek (500ml)</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12 order-no-details">
                  <h2 class="">Order ID : ORD15378</h2>
                  <p>Amazon Bom-1</p>
                  <p>Amazon Seller Services Private Limited Prathamesh Complex, Building No. H, Opp. Vatika Restaurant Mumbai - Nasik Highway No. 3, Bhiwandi By-pass Road Bhiwandi, Maharashtra 421302</p>
                </div>
                
                <div class="col-md-12" style="background-color: #F5F5F5!important;padding-top: 15px; padding-bottom: 15px;">
                  <p class="tearm-condition">I hereby confirm that said above goods are being purchased for my internal or personal purpose and not for re-sale. Ifurther understand and agree to Dr.Patkar's Terms and Conditions of Sale available at www.drpatkars.com or upon request</p>
                </div>

                <div class="row">
                  <div class="col-xs-12 mt-40 print-wrap">
                    <a class="btn green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                  </div>
                </div>
              </div>
              <!-- MAIN CONTENTS END HERE --> 
              </div>
            </div>
          <!-- END CONTENT BODY -->
        <!-- END CONTENT -->
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
