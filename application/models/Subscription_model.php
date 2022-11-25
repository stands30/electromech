<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function subscriptionList($resType,$dataOptn='')
    {
        $sqlQuery = 'SELECT *,
        (SELECT ppl_name FROM people WHERE ppl_id = scr_client_id) cus_name,
        ifnull((SELECT cmp_name FROM company WHERE cmp_id = scr_account_id),"") cmp_name,
        (SELECT gnp_name FROM gen_prm WHERE gnp_value = scr_status AND gnp_group = "sub_status") scr_status_name,
        fnNextasyDate(scr_crdt_dt) scr_crdt_dt_format
        FROM xsubscription order by scr_id desc';

        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
        return $result;
    }

    function getSubscriptionDetailByID($scr_id)
    {
        $sqlQuery = 'SELECT *,
        (SELECT ppl_name FROM people WHERE ppl_id = scr_client_id) cus_name,
        ifnull((SELECT cmp_name FROM company WHERE cmp_id = scr_account_id),"") cmp_name,
        (SELECT gnp_name FROM gen_prm WHERE gnp_value = scr_status AND gnp_group = "sub_status") scr_status_name,
        fnNextasyDate(scr_crdt_dt) scr_crdt_dt_format
        FROM xsubscription where scr_id = '.$scr_id.' and scr_status = '.ACTIVE_STATUS;

        return  $this->home_model->executeSqlQuery($sqlQuery,'row');

    }
}
?>