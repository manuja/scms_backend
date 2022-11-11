<?php
  class Order_model extends CI_Model {
       
      public function __construct(){
          
        $this->load->database();
        
      }
      

    /*
    @Ujitha Sudasingha
    2022-11-04
    Function to get order the infromation from db
    */
    public function getSingleOrder($id){

       $this->db->select('*');
       $this->db->from('temp_orders');
       $this->db->where('id',$id );
       $query = $this->db->get();
       return $query->result_array();

    }

    
    /*
    @Ujitha Sudasingha
    2022-11-04
    Function to save the order in database level
    */
    public function updateOrderFirst($data,$orderid){

        $this->db->where('id', $orderid);

       if($this->db->update('temp_orders', $data)){

          return true;

        }else{

          return false;

        }


    }


     /*
    @Ujitha Sudasingha
    2022-11-04
    Function to get available item count from db
    */
    public function getAvailableItemCount($id){

       $this->db->select('*');
       $this->db->from('orderitem');
       $this->db->where('id',$id );
       $query = $this->db->get();
       return $query->result_array();

    }
    

    

    //API call - get all books record
    public function getallorders(){   


      $this->db->select('temp_orders.id,temp_orders.name,temp_orders.client,temp_orders.order_need_date,temp_orders.contactno');
      $this->db->from('temp_orders');
      $this->db->join('orderlist','temp_orders.id = orderlist.order_id','left');
      $this->db->join('orderitem','orderlist.order_item_id = orderitem.id','left');
      $this->db->where('status', 1);
      $this->db->group_by('temp_orders.id');
      $this->db->order_by('temp_orders.id','DESC');

     // print_r('<pre>');
     // print_r(this->db->get()->result());die();
      
      return $this->db->get()->result();

    }
   
   //API call - delete a book record
    public function delete($id){

       $this->db->where('id', $id);

       if($this->db->delete('tbl_books')){

          return true;

        }else{

          return false;

        }

   }
   
   //API call - add new book record
    public function add($data){

        if($this->db->insert('tbl_books', $data)){

           return true;

        }else{

           return false;

        }

    }


     public function deleteSingleOrder($id){

       $this->db->where('id', $id);

       $data['status']=0;

       if($this->db->update('temp_orders', $data)){

          return true;

        }else{

          return false;

        }

    }
    
    //API call - update a book record
    public function update($id, $data){

       $this->db->where('id', $id);

       if($this->db->update('tbl_books', $data)){

          return true;

        }else{

          return false;

        }

    }

    //API call - get a book record by isbn
      public function getbookbyisbn($isbn){  

           $this->db->select('id, name, price, author, category, language, ISBN, publish_date');

           $this->db->from('tbl_books');

           $this->db->where('isbn',$isbn);

           $query = $this->db->get();
           
           if($query->num_rows() == 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }

      }


    public function addOrderFirst(){

       $data = array(
            'status' => 0,
        );
        $this->db->insert('temp_orders', $data);
        return $this->db->insert_id();


    }

}