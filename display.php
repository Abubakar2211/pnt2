<?php
session_start();
include 'header.php';

$csvData = $_SESSION['csv_data'] ?? [];
$formType = $_GET['formType'] ?? 'add_contact'; // Determine the form type
$fields = ($formType === 'client') ? 
    ['Name', 'Email', 'contact', 'cellPhone', 'cellNumber', 'joining', 'companyName', 'clientStatus', 'clientBoardcase'] : 
    ['firstName', 'lastName', 'cell', 'landline', 'category', 'sub-category', 'country', 'religion', 'Email', 'website', 'designation', 'companyName'];

if (empty($csvData)) {
    echo "No CSV data found.";
    exit;
}
?>

<div class="container">
    <h1 class="my-4">Map CSV Data - <?php echo ucfirst($formType); ?></h1>
    <form action="insert_data.php" method="post">
        <div class="row">
            <?php foreach ($csvData[0] as $index => $column): ?>
                <div class="col-md-4">
                    <div class="box border border-2 p-3  my-2 ">
                        <select class="form-control" name="mapping[<?php echo $index; ?>]" id="column_<?php echo $index; ?>">
                            <option value="">Select field</option>
                            <?php foreach ($fields as $field): ?>
                                <option value="<?php echo $field; ?>"><?php echo $field; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <label for="column_
                         <?php 
                        //  echo $index; ?>"><
                        ?php echo htmlspecialchars($column);
                         ?>
                        </label> -->
                        <div class="border border-1 my-2 p-2">
                            <?php foreach ($csvData as $rowIndex => $row): ?>
                                <?php if ($rowIndex > 0): // Skip header row ?>
                                    <div><?php echo htmlspecialchars($row[$index]); ?> <hr class="my-1"></div>
                                    
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary my-4">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>
