  <style type="text/css">
    .color-grey
    {
      background-color:#9eacad !important;
    }
  </style>
  <?php 
    $cmpData              = $this->company_model->getCompanyById($cmp_id); 
    $cmpEncryptedId       = $this->nextasy_url_encrypt->encrypt_openssl($cmp_id);
    $companyType           = $this->home_model->getGenPrmResultByGroup('company_type','result_array');
    $companyTypeF1KeyArray = array_column($companyType, 'f1');
  ?>
  <!-- <aside class="profile-nav col-lg-3"> -->
    <aside class="col-lg-2 sidebar-menu-list">
     <section class="panel">
        <div class="user-heading round color-primary">
          <p class="sidebar-title">Company Details</p>
      <?php
      if($cmpData->cmp_logo != '' && $cmpData->cmp_logo != '0') 
      { ?>
          <div class="profile-icon">
              <!-- <i class="fa fa-user fa-2x" aria-hidden="true" ></i> -->
              <img src="<?php echo base_url().COMPANY_LOGO.$cmpData->cmp_logo; ?>" class="img-responsive">
          </div>
      <?php } ?>
           <h1><?php echo $cmpData->cmp_name; ?></h1>
           <!-- <p><?php if($cmpData->cmp_website != ''){ echo '<a href="http://'.$companydata->cmp_website.'"><i class="fa fa-globe" aria-hidden="true"></i> '.$cmpData->cmp_website.'</a>'; }?></p> -->
        </div>
        <div class="actions actions-sidebar">
          <div class="btn-group text-center">
            <a class="btn-view-more" ></a>
          </div>
        </div>
        <ul class="nav nav-pills nav-stacked color-primary nav-stack">
           <li id="company-details" class="company_link">
              <a href="<?php echo base_url().'company-details-'.$cmpEncryptedId; ?>">
                  <span>Company</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>
      <?php 
      if(!empty($companyType)) 
      { 
        foreach ($companyType as $companyTypekey)
        { 
          $companyTypeVisibleClass = '';
          switch ($companyTypekey['f1']) {
              case COMPANY_TYPE_PEOPLE:
                  $companyTypeLink = 'company-people-detail-';
                  $companyTypeVisible = $cmpData->cmp_ppl_count;
                  break;
              case COMPANY_TYPE_PROJECT:
                  $companyTypeLink = 'company-project-detail-';
                  $companyTypeVisible = $cmpData->cmp_prj_count;
                  break;
              default:
                  $companyTypeLink = '';
                  break;
              }
              if($companyTypeVisible <= 0)
              {
                $companyTypeVisibleClass = 'color-inactive';
              }
              ?>
            <li id="company-details" class="company_link <?php echo $companyTypeVisibleClass; ?>"  >
              <a href="<?php echo base_url().$companyTypeLink.$cmpEncryptedId; ?>">
                  <span><?php echo $companyTypekey['f2']; ?></span>
                  <span class="sidebar-badge"><?php echo $companyTypeVisible; ?></span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>   
          <?php
        }
      }
      ?>

    
      <!-- <li id="company-details" class="people_link "  >
          <a href="<?php echo base_url('company-activity-detail-').$cmpEncryptedId; ?>">
              <span>Activity</span>
              <i class="fas fa-caret-right"></i>
          </a>
       </li> -->
         <!--  <li id="company-details" class="company_link "  >
              <a href="<?php echo base_url('company-login'); ?>">
                  <span>Login</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>    -->
        </ul>
     </section>
  </aside>
