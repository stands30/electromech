<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Order_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
       public function getGenPrmforDropdown($genPrmGroup,$search='')
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $genPrmSqlQuery.="  ORDER BY gnp_order ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
      public function getCompanyDropdown($cmp_type,$search='',$lead='')
    {
        $companyQuery = "SELECT  cmp_id as id,cmp_name as text,cmp_address,cmp_gst_no,cmp_stm_id,
        (SELECT fnGetPeopleNameByID(cpl_ppl_id) from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_name,
        (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_id
         FROM company where cmp_status IN ('".ACTIVE_STATUS."')  ";
        // and cmp_type_id='".$cmp_type."'
         if($lead !='' && $lead != 0)
        {
          $companyQuery.=" and cmp_id in (SELECT led_cmp_id from lead where led_id='".$lead."') ";
        }
       
        if($search !='')
        {
          $companyQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $companyQuery.="  ORDER BY cmp_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select','cmp_address'=>'','cmp_gst_no'=>'');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
  
        public function getProductDropdown($search='')
    {
        $dropdDownQuery = "SELECT  prd_id as id,(IF(prd_unit != 0 && prd_unit != '',CONCAT(prd_name,' - ',getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)) as text,prd_desc,prd_gst,
        (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) prd_variant,
        (SELECT prv_id FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) prd_variant_id,
        (SELECT prv_price FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id LIMIT 1) prd_price
         FROM product where prd_status IN ('".ACTIVE_STATUS."')  ";
        if($search !='')
        {
          $dropdDownQuery.=" and prd_name LIKE '%".$search."%' ";
        }
        $dropdDownQuery.="  ORDER BY prd_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($dropdDownQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function multi_form_data_save($form_data_id='')
    {
        // **** Form ***//
        $form_data = $_POST;
        $form_prefix = 'ord';
        $form_prd_prefix = 'orp';
        $form_table = 'orders';
        $form_product_table = 'order_product';
        $form_product = array();
        $form_product = $form_data['product_repeater_item'];
        $delete_form_prod_id = $this->input->post('delete_form_prod_id');
        $file_count = $this->input->post('file_count');
        $module_total_old_value = $form_data['ord_total_old_value'];
        $module_total = $form_data['ord_total'];
        unset($form_data['product_repeater_item']);
        unset($form_data['delete_form_prod_id']);
        unset($form_data['ord_total_old_value']);
        unset($form_data['ord_no']);
        unset($form_data['clone_check']);
        unset($form_data['ord_apprvl_status']);
        // $form_data['qtn_date']    = mysqlDateFormat($form_data['qtn_date']);
        if($form_data_id != '')
        {   
            $form_data[$form_prefix.'_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data[$form_prefix.'_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data_update = $this->home_model->update($form_prefix.'_id',$form_data_id,$form_data,$form_table);
            if($module_total_old_value != $module_total)
            {
              $status_transact = array(
              'otr_ord_id' => $form_data_id,
              'otr_field' => DISPATCH_ORDER_TRANSACTION_FIELD_AMOUNT,
              'otr_old_value' => $module_total_old_value,
              'otr_new_value' => $module_total,
              'otr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
              'otr_crdt_dt' => date('Y-m-d H:i:s')
               );
               $this->home_model->insert('order_transaction',$status_transact); 
            }
        }
        else
        {
           $form_data[$form_prefix.'_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data[$form_prefix.'_crdt_dt'] = date('Y-m-d H:i:m');
            $form_data[$form_prefix.'_apprvl_status'] = DISPATCH_ORDER_APPROVAL_STATUS_PENDING;
            $form_data[$form_prefix.'_dispatch_status'] = DISPATCH_ORDER_DISPATCH_STATUS_PENDING;
            $form_data_id = $this->home_model->insert($form_table,$form_data);
             $status_transact = array(
            'otr_ord_id' => $form_data_id,
            'otr_field' => DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS,
            'otr_old_value' => 0,
            'otr_new_value' => DISPATCH_ORDER_APPROVAL_STATUS_PENDING,
            'otr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'otr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('order_transaction',$status_transact); 

        }
        // **** Form ***//
        // **** Form Product ***//

        $form_product_insert = array();
        $form_product_update = array();
      for ($i=0; $i < count($form_product) ; $i++) { 
          if(isset($form_product[$i][$form_prd_prefix.'_id']) && $form_product[$i][$form_prd_prefix.'_id'] == '')
          {
                $form_product[$i][$form_prd_prefix.'_'.$form_prefix.'_id'] = $form_data_id;
                $form_product[$i][$form_prd_prefix.'_crdt_dt'] = date('Y-m-d H:i:s');
                unset($form_product[$i][$form_prd_prefix.'_id']);
                array_push($form_product_insert,$form_product[$i]);
              
          }
          else
          {
                array_push($form_product_update,$form_product[$i]);
          }
        }
      /*  echo ' insert >> ';
        print_r($form_product_insert);
        echo ' insert << ';
        echo ' update >> ';
        print_r($form_product_update);
        echo ' update << ';*/

            if(!empty($form_product_insert))
            {
                   $quotationProductData_insert                 = $this->db->insert_batch($form_product_table, $form_product_insert);
            }
            if(!empty($form_product_update))
            {
                 $quotationProductData_update                 = $this->db->update_batch($form_product_table, $form_product_update,$form_prd_prefix.'_id');
            }
          if($delete_form_prod_id)
          {
              
            $res_data = $this->home_model->deleteMultipleData($form_product_table,$form_prd_prefix.'_id',$delete_form_prod_id,true);
          }
           // ************** IMAGE INSERT *************//
            $imageData = array();
            if ($file_count > 0)
            {
              for ($k = 0; $k < $file_count; $k++)
              {
                log_message('nexlog', 'image >> $this->upload_image for loop i :' . $k);
                $imageData[] = array(
                  'doc_type' => DOCUMENT_TYPE_DISPATCH_ORDER,
                  'doc_type_id' => $form_data_id,
                  'doc_name' => upload_multiple_doc(DISPATCH_ORDER_DOCUMENT_PATH, DISPATCH_ORDER_DOCUMENT_PATH, 'ord_document', $k, 'document') ,
                  'doc_status' => ACTIVE_STATUS,
                  'doc_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID) ,
                  'doc_crdt_dt' => date('Y-m-d H:i:s')
                );
              }
              // print_r($imageData);
              $docId = $this->db->insert_batch('document', $imageData);
            }

            // ************** IMAGE INSERT *************//
        // **** Form Product ***//
        return $form_data_id;
    }
   
     function getModuleList($resType, $dataOptn = '')
  {
    $sqlQuery = "SELECT ord_id,ord_code,ord_cmp_id,ord_dispatch_status,ord_reference_no,
    getGenPrmValueByGroup('ord_type',ord_type) ord_type_value,
    getGenPrmValueByGroup('ord_category',ord_category) ord_category_value,
    FORMAT(ord_total,2) ord_total_format,ord_title,
    IFNULL((DATE_FORMAT(ord_date, '%d %M,%Y')),'') ord_date_format,
    IFNULL((DATE_FORMAT(ord_crdt_dt, '%d %M,%Y')),'') ord_crdt_dt_format,
    ord_crdt_dt,
        getGenPrmValueByGroup('ord_dispatch_status',ord_dispatch_status) ord_dispatch_status_value,
    (SELECT cmp_name from company where cmp_id=ord_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_cmp_id_value
     " . checkPrivate($dataOptn['mnu_name'], 'ord_crdt_by') . "
     from orders where ord_status IN (" . ACTIVE_STATUS . ")";
    if(isset($dataOptn['ord_order_status']) && $dataOptn['ord_order_status'] != '' && $dataOptn['ord_order_status'] != 'all')
     {
      $sqlQuery.=" and ord_order_status='".$dataOptn['ord_order_status']."' ";
     }
   
    $sqlQuery.= " ORDER BY ord_crdt_dt DESC";

    $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $queryResult;
  }
    public function getOrderDataById($ord_id,$mnu_name='')
    {
      $private_condition='';
      if ($mnu_name != '' && checkaccess($mnu_name, 'private')) {
      $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $private_condition =" and ord_crdt_by ='".$ppl_id."' ";
     }
       $sqlQuery = "
       SELECT ord_id,ord_code,ord_cmp_id,ord_remark,ord_tax_computation,ord_product_tax,ord_reference_no,
        FORMAT(ord_sub_total,2) ord_sub_total_format,ord_tax,ord_tax_percent,ord_billing_cmp,ord_date,
        FORMAT(ord_tax,2) ord_tax_format,ord_cmp_state,ord_billing_cmp_state,ord_sub_total,ord_total,
        FORMAT(ord_total,2) ord_total_format,ord_total ord_total_old_value,
        IFNULL((DATE_FORMAT(ord_date, '%d %M,%Y')),'') ord_date_format,
        IFNULL((DATE_FORMAT(ord_crdt_dt, '%d %M,%Y')),'') ord_crdt_dt_format,
        IFNULL((DATE_FORMAT(ord_dispatch_date, '%d %M,%Y')),'') ord_dispatch_date_format,
        fnGetPeopleNameByID(`ord_crdt_by`) ord_crdt_by_name,
        getGenPrmValueByGroup('ord_type',ord_type) ord_type_value,
        getGenPrmValueByGroup('ord_category',ord_category) ord_category_value,
        getGenPrmValueByGroup('ord_order_status',ord_order_status) ord_order_status_value,
        ord_payment_due_days,ord_crdt_dt,ord_dispatch_due_days,
         CONCAT(fnGetPeopleNameByID(`ord_dispatch_by`),' on '
         ,IFNULL((DATE_FORMAT(ord_dispatch_date, '%d %M,%Y')),'')) ord_dispatched_by,
          ord_billing_addr,ord_billing_gst,ord_billing_people,ord_shipping_addr,ord_shipping_gst,ord_shipping_people,
        fnGetPeopleNameByID(`ord_billing_people`) ord_billing_people_value,
        fnGetPeopleNameByID(`ord_shipping_people`) ord_shipping_people_value,
        ord_dispatch_status,
        getGenPrmValueByGroup('ord_dispatch_status',ord_dispatch_status) ord_dispatch_status_value,
        (SELECT cmp_name from company where cmp_id=ord_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_cmp_id_value,
        (SELECT cmp_name from company where cmp_id=ord_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_billing_cmp_value,
        (SELECT cmp_address from company where cmp_id=ord_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_billing_cmp_address,
        (SELECT cmp_gst_no from company where cmp_id=ord_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_billing_cmp_gst_no, 
        (SELECT cmp_gst_no from company where cmp_id=ord_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_cmp_gst_no, 
        (SELECT cmp_logo from company where cmp_id=ord_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) ord_billing_cmp_logo,
        (IFNULL((select MIN(ord_id) from orders where ord_id > '" . $ord_id . "' and ord_status='" . ACTIVE_STATUS . "' ".$private_condition."),(SELECT MIN(ord_id) from orders where ord_status='" . ACTIVE_STATUS . "' ".$private_condition."))) next_order,
        (IFNULL((select MAX(ord_id) from orders where ord_id < '" . $ord_id . "' and ord_status='" . ACTIVE_STATUS . "' ".$private_condition."),(SELECT MAX(ord_id)  from orders where ord_status='" . ACTIVE_STATUS . "' ".$private_condition."))) prev_order ".checkPrivate('order-list', 'ord_crdt_by')."
     from orders where ord_status IN (" . ACTIVE_STATUS . ") and ord_id='".$ord_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
       public function getOrderProductDataById($ord_id)
    {
    
      $sqlQuery = "SELECT orp_id,orp_desc,orp_rate,orp_qty,FORMAT(orp_rate,2) orp_rate_format,orp_prv_id,
       FORMAT(orp_tax,2) orp_tax_format,FORMAT(orp_sub_total,2) orp_sub_total_format,FORMAT(orp_total,2) orp_total_format,orp_tax_percent,orp_sub_total,orp_prd_id,orp_total,orp_tax,
       (SELECT if(prd_unit != '',CONCAT(prd_name,' - ', getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit)),prd_name) from product where prd_id=orp_prd_id and prd_status='".ACTIVE_STATUS."') orp_prd_id_value,
       (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_id =orp_prv_id ) orp_prv_id_value
          from order_product where orp_status IN (" . ACTIVE_STATUS . ") and orp_ord_id='".$ord_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }

 
 
  function getActivity($por_id = '')
  {
    log_message('nexlog', 'order_model::checkPOActivity >>');
    $sqlQuery = "SELECT otr_old_value field_old_value,otr_new_value field_new_value,otr_crdt_by created_by,otr_crdt_dt created_dt,
    (SELECT ppl_name from people where ppl_status='" . ACTIVE_STATUS . "' and ppl_id=otr_crdt_by ) field_changed_by,
    if(otr_old_value = 0 ,CONCAT(' created <span class=\"activity-created\">Dispatch Order</span>'),
    CASE
     when  otr_field = ".DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='otr_field' and gnp_value=otr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='ord_dispatch_status' and gnp_value=otr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='ord_dispatch_status' and gnp_value=otr_new_value LIMIT 1),'</span>')
     when  otr_field = ".DISPATCH_ORDER_TRANSACTION_FIELD_DISPATCH_STATUS."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='otr_field' and gnp_value=otr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='ord_apprvl_status' and gnp_value=otr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='ord_apprvl_status' and gnp_value=otr_new_value LIMIT 1),'</span>')
    when  otr_field = ".DISPATCH_ORDER_TRANSACTION_FIELD_AMOUNT."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='otr_field' and gnp_value=otr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',CONVERT(FORMAT(otr_old_value, 2) using utf8),'</span> to <span class=\"activity-end-amount\">',CONVERT(FORMAT(otr_new_value, 2) using utf8),'</span>')
    END ) field_changed_desc,'fas fa-info' field_icon,
      CONCAT('filter_',otr_new_value) field_filter
    FROM dispatch_order_transaction where otr_status='" . ACTIVE_STATUS . "'  ";
    // echo ' $por_id : '.$por_id;
    if ($por_id != '')
    {
      $sqlQuery.= " and otr_por_id ='" . $por_id . "'";
    }
      $sqlQuery.= " ORDER BY otr_crdt_dt DESC";
    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    log_message('nexlog', ' row : ' . json_encode($result));
    log_message('nexlog', 'order_model::checkPOActivity <<');
    return $result;
  }
   public function getProductVariantDropdown($prd_id,$search='')
    {
        $dropdDownQuery = "SELECT  prv_id as id,getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id)  as text,prv_price FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id = '".$prd_id."'  ";
        if($search !='')
        {
          $dropdDownQuery.=" and text LIKE '%".$search."%' ";
        }
        $dropdDownQuery.="  ORDER BY prv_id ASC";
        // ***** It is used to reset value of select2 ****** //
        // $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($dropdDownQuery,'result');
        if($search =='')
          {
            // array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
      public function getBillingCompanyDropdown($search='')
    {
        $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
       
        $companyQuery = "SELECT  cmp_id as id,cmp_name as text,cmp_address,cmp_gst_no,cmp_stm_id cmp_state,cmp_payment_terms FROM company where cmp_status IN ('".ACTIVE_STATUS."')  and cmp_id IN (SELECT cpl_cmp_id from cmp_people where cpl_ppl_id ='".$ppl_id."' and cpl_status='".ACTIVE_STATUS."') ";
         
        if($search !='')
        {
          $companyQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $companyQuery.="  ORDER BY cmp_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
          public function getCurrentBillingCompany()
    {
        $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
       
        $companyQuery = "SELECT cmp_id,cmp_name,cmp_stm_id cmp_state,cmp_payment_terms from company cmp RIGHT JOIN employee emp on cmp.cmp_id=emp.emp_cmp_id where emp_ppl_id='".$ppl_id."' and emp_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' ";
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'row');
        return $queryResult;
    }
     public function updateCustomData($customArray)
    {
      if(isset($_POST['field']) && $_POST['field']) 
      {
         $customData = array(
        $_POST['field'] => $_POST['field_value']
      );
      }else
      {
        $customData = $_POST;
      }
     if(!empty($customArray))
     {
        $customData = array_merge($customArray,$customData);

     }
      $ord_id = $_POST['ord_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('ord_id', $ord_id, $customData, 'dispatch_order');
      }
       /*if(isset($_POST['field']) && $_POST['field'] == 'ord_apprvl_status' ||  $_POST['field'] == 'ord_dispatch_status') 
       {
        $field = ($_POST['field'] == 'ord_apprvl_status') ? DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS:DISPATCH_ORDER_TRANSACTION_FIELD_DISPATCH_STATUS;
          $status_transact = array(
            'otr_ord_id' => $ord_id,
            'otr_field' => $field,
            'otr_old_value' => $_POST['old_value'],
            'otr_new_value' => $_POST['field_value'],
            'otr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'otr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('order_transaction',$status_transact); 
        }*/
      return $custmData;
    }
     public function getPeopleDropdown($search='',$lead='',$company='')
    {
        $sqlQuery = "SELECT  ppl_id as id,CONCAT( (select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id) ,'',ppl_name)  as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')  ";
         if($lead !='' && $lead != 0)
        {
          $sqlQuery.=" and ppl_id in (SELECT led_ppl_id from lead where led_id='".$lead."') ";
        }
         if($company !='' && $company != 0)
        {
          $sqlQuery.=" and ppl_id in (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id='".$company."' and cpl_status='".ACTIVE_STATUS."') ";
        }
        if($search !='')
        {
          $sqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY ppl_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
}