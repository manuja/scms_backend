<?php

 /*
    @Ujitha Sudasingha
    2022-11-04
    Api end point
    */

require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();


        $header=getallheaders();

        if(trim($header['token']) == 'Ab&5$rgyh123oakyhgfdA') {

          }else{
            $this->response("Unorthorized Acesss", 401);
          }

        $this->load->model('order_model');
        $this->load->model('Item_model', 'itemmodel');
    }


      /*
    @Ujitha Sudasingha
    2022-11-04
    Function to get the order details via rest web-service endpoint
    */

     function getSingleOrder_get(){

        $id  = $this->get('id');
        if(!$id){
            $this->response("No ID specified", 400);
            exit;
        }
        $result = $this->order_model->getSingleOrder( $id );
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($result);
    } 

    function deleteSingleOrder_get(){

        $id  = $this->get('id');

        //print_r("aaaaaaaaaaa".$id);die();

        $result = $this->order_model->deleteSingleOrder( $id );



        $this->output->set_header('Content-Type: application/json');
        echo json_encode($result);

        
    }

       /*
    @Ujitha Sudasingha
    2022-11-04
    All orders and point
    */
    function orders_get(){
        //$this->response("No record foundaaaa", 404);die();

        $result = $this->order_model->getallorders();
        //print_r('<pre>');
        //print_r(result);

        if($result){

            $this->response($result, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }


    function addOrder_post(){

        $json = array();
        $last_id = $this->order_model->addOrderFirst();
        $json['status']=$last_id;
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($last_id);

    }


     /*
    @Ujitha Sudasingha
    2022-11-04
    Function to save the order in rest web-service
    */
    function addTotalOrder_post(){

       // $this->response("Unorthorized Acesss", 401);die();

        $data['name']=$this->input->post('ordername'); 
        $data['status']=1;
        $data['order_need_date']=$this->input->post('order_need_date');
        $data['description']=$this->input->post('description');
        $data['created_by']=$this->input->post('created_by');
        $data['client']=$this->input->post('client');
        $data['contactno']=$this->input->post('contactno');
        $orderid=$this->input->post('orderid');
        $list = $this->itemmodel->getStaffList($orderid);

        $formidentify=$this->input->post('form_identify');

        for($i=0;$i<=sizeof($list);$i++){

            $current_avail_count=0;
            $order_item_count=0;

            $orderitemid=$list[$i]['orderitemid'];
            $current_avail_count=$list[$i]['avail_qty'];
            $order_item_count=$list[$i]['qty'];
            $net=$list[$i]['qtyedit_previous'];

            if($formidentify==1){

            $new_current_avail_count=$current_avail_count - $order_item_count;
        }else{
            $new_current_avail_count=$current_avail_count + $net;
        }


           $valr=$this->itemmodel->updateItemCount($orderitemid,$new_current_avail_count);

        }




        $json = array();
        $last_res = $this->order_model->updateOrderFirst($data,$orderid);
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($last_res);

    }


        /*
    @Ujitha Sudasingha
    2022-11-04
    Web service endpoint to add items
    */
    function addItem_post(){
                
        
        $qty = $this->input->post('qty');  
        $orderid= $this->input->post('orderidval'); 
        $itemid= $this->input->post('droporderitem'); 

        $list = $this->order_model->getAvailableItemCount($itemid);


        $json = array();

        if(empty(trim($qty))){
           // print_r("not god");die();
            $json['error']['qty'] = 'Please enter item quantity';
        }      

        if(empty(trim($itemid))){
            $json['error']['droporderitem'] = 'Please select an item';
        }
        if($list[0]['avail_qty']<$qty){

            $json['error']['qty'] = 'Sorry, stock unavailable for that much quantity';
        }

        if(empty($json['error'])){
            // $this->itemmodel->setQty($name);            
            // $this->itemmodel->setEmail($email);
            // $this->itemmodel->setAddress($address);
            // $this->itemmodel->setSalary($salary);
            // $this->itemmodel->setMobile($mobile);
            try {
                $last_id = $this->itemmodel->createStaff($orderid,$itemid,$qty);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
                
            if (!empty($last_id) && $last_id > 0) {
                $staffID = $last_id;
                $this->itemmodel->setStaffID($staffID);
                $staffInfo = $this->itemmodel->getStaff();                    
                $json['staff_id'] = $staffInfo['id'];
                $json['name'] = $staffInfo['name'];                
                $json['email'] = $staffInfo['email'];
                $json['address'] = $staffInfo['address'];
                $json['mobile'] = $staffInfo['mobile'];
                $json['salary'] = $staffInfo['salary'];
                $json['status'] = 'success';
            }
        }
        $this->output->set_header('Content-Type: application/json');
       // print_r("qqq is ".$json[0] );die();
        echo json_encode($json);
    }

        /*
    @Ujitha Sudasingha
    2022-11-04
    Web service endpoint to update item
    */
    function updateItem_post(){

        // $this->response("No record foundssssssssssssssssssss".$this->input->post('qtyedit'), 404);

        $qty = $this->input->post('qtyedit');  
        $orderid= $this->input->post('orderidval'); 
        $itemid= $this->input->post('droporderitemedit');  
        $orderid= $this->input->post('orderidval'); ;
        $listitemid= $this->input->post('ListItemId');
        $qtyedithide= $this->input->post('qtyedithide');

        
        if($qty>$qtyedithide){
        $data['qtyedit_previous']=$qtyedithide-$qty;
        }elseif($qty<$qtyedithide){
        $data['qtyedit_previous']=$qtyedithide-$qty;
        }else{
            $data['qtyedit_previous']=$qty;
        }

        $listava = $this->order_model->getAvailableItemCount($itemid);

        $json = array();

        $data['order_item_id']=$itemid;
        $data['qty']=$qty;

        if(empty(trim($qty))){
           // print_r("not god");die();
            $json['error']['qtyedit'] = 'Please enter item quantity';
        }      

        if(empty(trim($itemid))){
            $json['error']['droporderitemedit'] = 'Please select an item';
        }
        if($listava[0]['avail_qty']<$qty){

            $json['error']['qtyedit'] = 'Sorry, stock unavailable for that much quantity';
        }

        if(empty($json['error'])){

             $list = $this->itemmodel->updateOrderdItem($data,$listitemid);
        }


        
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json);


    }


        /*
    @Ujitha Sudasingha
    2022-11-04
    Web service endpoint to retrive Orders
    */
    function getOrderItem_get(){

       // print_r("hiia");die();
        $orderid  = $this->get('orderid');

        $json = array();    
        $list = $this->itemmodel->getStaffList($orderid);
        //print_r($list);die();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id'];
            $row[] = $element['orderitemid'];
            $row[] = $element['orderlistid'];
            $row[] = $element['orderitemname'];
            $row[] = $element['qty'];
            
           
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->itemmodel->countAll(),
            "recordsFiltered" => $this->itemmodel->countFiltered(),
            "data" => $data,
        );       
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
    }

    function getOrderedItemSingle_get(){

        $itemid  = $this->get('itemid');
        $itemlist = $this->itemmodel->getOrderedItemSingle($itemid);

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($itemlist);

        //$this->response("No record foundssssssssssssssssssss".$itemid, 404);
        //print_r($itemid);die();
    }

    function deleteOrderedItemSingle_get(){

        $itemid  = $this->get('itemid');
        $itemlist = $this->itemmodel->deleteOrderedItemSingle($itemid);

        $this->output->set_header('Content-Type: application/json');
        echo json_encode($itemlist);

        //$this->response("No record foundssssssssssssssssssss".$itemid, 404);
        //print_r($itemid);die();
    }

     function getOriginOrderItem_get(){


        $json = array();    
        $list = $this->itemmodel->getItemOrginList();

        $neworder = array_column($list, 'name', 'id');

        $this->output->set_header('Content-Type: application/json');
       
        echo json_encode($neworder);
        
    }




}