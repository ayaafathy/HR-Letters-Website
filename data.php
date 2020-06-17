<?php  
session_start();

$connect= mysqli_connect("localhost", "root", "", "HR");
if (!$connect) 
{
   ?>
   <div class='alert alert-danger'> <?php die("Failed to connect to MySQL: " . mysqli_connect_error());?></div>
   <?php
}


 $output = '';  
 $sql = "SELECT * FROM qanda ORDER BY Q_ID ASC";  
 $result = mysqli_query($connect, $sql);  

 $output .= '  
      <div clas="table-responsive">  
           <input class="form-control" id="search" type="text" placeholder="Search by Category"> <br>

           <table class="table table-hover table-striped">  
                <thead class="thead-dark"> 
                <tr> 
                     <th width="5%">ID</th>  
                     <th width="10%">Category</th>
                     <th width="5%">HR</th> 
                     <th width="40%">Question</th>  
                     <th width="40%">Answer</th>  
                     <th width="5%">Delete</th> 
                </tr>  
                </thead>';  

$rows = mysqli_num_rows($result);

if($rows > 0)  
{ 
       while($row = mysqli_fetch_array($result))  
       {  
           $output .= '  
                <tbody id="data">
                <tr>  
                     <td class="Q_ID" data-id1="'.$row["Q_ID"].'" contenteditable>'.$row["Q_ID"].'</td>  
                     <td class="Q_type" data-id1="'.$row["Q_ID"].'" contenteditable>'.$row["Q_type"].'</td>  
                     <td class="user_ID" data-id2="'.$row["Q_ID"].'" contenteditable>'.$row["user_ID"].'</td> 
                     <td class="Q" data-id3="'.$row["Q_ID"].'" contenteditable>'.$row["Q"].'</td>  
                     <td class="A" data-id4="'.$row["Q_ID"].'" contenteditable>'.$row["A"].'</td>
                     <td><button type="button" name="delete_btn" data-id3="'.$row["Q_ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr> 
           ';  
       }  

       $output .= '  
           <tr>
                <td id="Q_ID" contenteditable></td> 
                <td id="Q_type" contenteditable></td>  
                <td id="user_ID" contenteditable></td>  
                <td id="Q" contenteditable></td>
                <td id="A" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
           </tbody>
      '; 


}

 else  
 {  
      $output .= '
			 <tr>  
                    <td id="Q_ID" contenteditable></td> 
                    <td id="Q_type" contenteditable></td>  
                    <td id="user_ID" contenteditable></td>
                    <td id="Q" contenteditable></td>
                    <td id="A" contenteditable></td>  
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			 </tr>';  
 } 

 $output .= '</table>  
             </div>';  
             
 echo $output;  
 ?>

