<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->mnu_name = 'order-list';
		$this->load->model('order_model');
	}

	public function order_list()
	{
		$data['title'] 		=	'Order List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	$dataOptn['mnu_name']=$this->mnu_name;
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['dataTableData'] = $this->order_model->getModuleList(TABLE_COUNT,$dataOptn);
		  	$data['ord_status_group']    = $this->home_model->getGenPrmResultByGroup('ord_order_status','result');
            $data['ord_status_group'][] = (object) array('f1'=>'all','f2'=>'All');
		    $this->load->view('order/order-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function order_add()
	{
		$data['title'] 		=	'Order Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('order-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	 $data['tax_computation'] = ($this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)) ? $this->home_model->getBusinessParamData(PURCHASE_ORDER_TAX_COMPUTATION)->bpm_value:'0';
            $data['tax_percent'] = ($this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)) ? $this->home_model->getBusinessParamData(FINANCE_TAX_PERCENT)->bpm_value:'0';
            $data['product_tax'] = ($this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)) ? $this->home_model->getBusinessParamData(FINANCE_PRODUCT_TAX)->bpm_value:'0';
            $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$data['global_asset_version'] = global_asset_version();
            $order_obj = new stdClass();
		  	$order_obj->ord_code = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'ord_code',
                                     	 		'table'		=> 'orders',
                                     	 		'type'		=>  ORDER_CODE,
                                     	 		'where'		=> ''
                                     		)
                                     	);
		    $this->load->view('order/order-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function order_details($ord_encrypted_id)
	{
		$data['title'] 		=	'Order Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('order-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['menu_name'] = $this->mnu_name;
		  	$ord_id = $this->nextasy_url_encrypt->decrypt_openssl($ord_encrypted_id);
	        $data['order'] = $this->order_model->getOrderDataById($ord_id,$this->mnu_name);
	        $data['ord_product'] = $this->order_model->getOrderProductDataById($ord_id);
	         $data['tax_computation'] = isset($data['order']->ord_tax_computation) ? $data['order']->ord_tax_computation:'0';
		    $data['tax_percent'] = isset($data['order']->ord_tax_percent) ? $data['order']->ord_tax_percent:'0';
	        $data['product_tax'] = isset($data['order']->ord_product_tax) ? $data['order']->ord_product_tax:'0';
	        $data['product_date'] = isset($data['order']->ord_date) ? $data['order']->ord_date:'';
	        $data['ord_code'] = isset($data['order']->ord_code) ? $data['order']->ord_code:'';
            $data['activity_filter']    = $this->home_model->getGenPrmResultByGroup('ord_order_status','result');
            $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$this->load->view('order/order-details', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function order_print()
	{
		$data['title'] 		=	'Order Print';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('order-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'print'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$this->load->view('order/order-print', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
	public function getModuleList()
    {
        log_message('nexlog',' order::getModuleList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->order_model->getModuleList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['ord_id']          = 'ord_encrypted_id';
        $enc_arr['ord_cmp_id']      = 'ord_cmp_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog',' order::getModuleList << ');
        echo json_encode($dataTableArray);
    }
     public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$dropDownData = array('results'=>$this->order_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search,$lead));
		echo json_encode($dropDownData);
	}
	public function getProductDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->order_model->getProductDropdown($search));
		echo json_encode($dropDownData);
	}
	public function getProductVariantDropdown()
	{
		$search       = $this->input->get('q');
		$product      = $this->input->get('product');
		$dropDownData = array('results'=>$this->order_model->getProductVariantDropdown($product,$search));
		echo json_encode($dropDownData);
	}
	public function multi_form_data_save()
    {
    	$form_data_save_id = $this->input->post('ord_id');
    	
        $form_data_id = $this->order_model->multi_form_data_save($form_data_save_id);
        if($form_data_id)
        {
            $form_data_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($form_data_id);
            $success = true;
            $message = ' Order created successfully';
            if($form_data_save_id !='')
            {
               $message = ' Order updated successfully';
            }
            $linkn   = base_url('order-details-'.$form_data_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->order_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function checkUniqueCode($field,$id='')
    {
        $custom_data = array();
        $custom_data['table']	     = 'orders';
        $custom_data['unique_col']   = 'ord_id';
        $custom_data['unique_id']    = $id;
        $custom_data['field']	     = $field;
        $custom_data['field_value']  = $this->input->post('value');
      $validate =  $this->home_model->checkUniqueCode($custom_data);
      if($validate->count > 0)
      {
         echo 'false';
      }
      else
      {
         echo 'true';
      }
    }
     public function getBillingCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->order_model->getBillingCompanyDropdown($search));
		echo json_encode($dropDownData);
	}
	 public function getActivity()
    {
        $por_id = $this->input->post('por_id');
        
      $data =  $this->order_model->getActivity($por_id);
        $enc_arr['created_by']          = 'ppl_encrypted_id';
        $data     = encrypt_key_in_array($data,$enc_arr);
        echo json_encode($data);
    }
	public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$lead        = $this->input->get('lead');
		$company     = $this->input->get('company');
		$dropDownData = array('results'=>$this->order_model->getPeopleDropdown($search,$lead,$company));
		echo json_encode($dropDownData);
	}

}

?>
