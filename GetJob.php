      <?php
      $con=mysqli_connect("localhost","root","","hr");
      $sql="SELECT * FROM `job` where Dep_ID='".$_POST["DepartmentID"]."'";
        $query=mysqli_query($con,$sql);
        ?>

        <option value="">Job title</option>
        <?php
        while($row=mysqli_fetch_array($query)){
          ?>
            
            <option value="<?php echo $row['JobID']; ?>">
            <?php echo $row['Job_title'];  ?></option>

          <?php
        }
 
      ?>  
