<?php
include "db.php";
$type = isset($_POST['type']) ? $_POST['type'] : '';
$sub_type = isset($_POST['sub_type']) ? $_POST['sub_type'] : '';
$sql="SELECT * FROM types INNER JOIN sub_types ON types.id = sub_types.type_id WHERE types.id = $type AND sub_types.id = $sub_type";
$res = mysqli_query($con,$sql);
while($data = mysqli_fetch_assoc($res)){
    echo "$data[first_name]";
}
// Generate the output
// $output = '<table id="contactsTable" class="table table-striped table-bordered">
//                 <thead>
//                     <tr>
//                         <th>S.s</th>
//                         <th>S.No</th>
//                         <th>First Name</th>
//                         <th>Cell Number</th>
//                         <th>Email</th>
//                         <th>Status</th>
//                         <th>Action</th>
//                     </tr>
//                 </thead>
//                 <tbody>';
//                 if (mysqli_num_rows($res) > 0) {
//                     $i = 1;
//                     while ($row = mysqli_fetch_assoc($res)) {
//                         $output .= "<tr>
//                             <td><input type='checkbox' class='record-checkbox' value='" . $row['id'] . "'></td>
//                             <td>{$i}</td>
//                             <td>" . $row['first_name'] . "</td>
//                             <td>" . $row['cell_number'] . "</td>
//                             <td>" . $row['email_id'] . "</td>";
                
//                         // Generate the status dropdown
//                         $status_query = "SELECT * FROM contacts_status";
//                         $status_result = mysqli_query($con, $status_query);
                
//                         $output .= "<td>
//                             <select name='status' class='status-dropdown form-control' data-id='{$row['id']}'>";
                
//                         while ($status_row = mysqli_fetch_assoc($status_result)) {
//                             $selected = ($row['status'] == $status_row['status']) ? 'selected' : '';
//                             $output .= "<option value='" . htmlspecialchars($status_row['status']) . "' $selected>" . htmlspecialchars($status_row['status']) . "</option>";
//                         }
                
//                         $output .= "</select>
//                         </td>";
                
//                         // Add action buttons
//                         $output .= "<td class='d-flex justify-content-around'>
//                             <button class='edit-btn btn btn-sm' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
//                             <button class='delete-btn btn btn-sm' data-id='{$row['id']}'><i class='fa-solid fa-delete-left'></i></button>
//                         </td>
//                         </tr>";
                
//                         $i++;
//                     }
//                 } else {
//                     $output .= "<tr><td colspan='7'>No Record Found</td></tr>";
//                 }
                
//                 $output .= '</tbody></table>';
//                 echo $output;


?>