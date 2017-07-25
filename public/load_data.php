<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "kinhdoanh_do_go");  
 $output = '';  
 if(isset($_POST["brand_id"]))  
 {  
      if($_POST["brand_id"] != '')  
      {  
           $sql = "SELECT * FROM category WHERE parent_id = '".$_POST["brand_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM product";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["id"].'">'.$row["name_type"].'</option>';   
      }  
      echo $output;  
 }  
 ?>  