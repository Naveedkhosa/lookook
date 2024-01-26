
<?php 
 include "../../config.php"; 

 if(isset($_POST['chef_charges']) && isset($_POST['s_id'])){
    $query = "SELECT * FROM charges WHERE service_id = {$_POST['s_id']};";
    $output = "";
    if($result = mysqli_query($conn,$query)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
              $output .='<tr data-sid="'.$row['charges_id'].'" class="bartender_fees">
              <td data-column="Group Size Range">'.$row['min_guest'].'-'.$row['max_guest'].' Guests</td>
              <td data-column="Pricing">
              <input type="number" name="1_4_guests" value="'.$row['fees'].'" min="0" step="1">
              </td>
          </tr>';
          }

          $output.=' <tr>
          <td data-column="Group Size Range"></td>
          <td data-column="Pricing">
              <button type="submit" id="update_bartender_fee">Update Prices</button>
          </td>
      </tr>';

      echo $output;
          
        }else{
            echo "<p style='width:100%;text-align:center;color:#999;padding:10px 0px;'>No service charges was found.</p>";
        }
    }else{
        echo "<p style='width:100%;text-align:center;color:red;padding:10px 0px;'>Something went wrong.</p>";
    }

 }
                    
?>