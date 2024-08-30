
<select name="category" id="category" class="form-control" required>
  <option value="" disabled selected>Select Category</option>
  <?php
  include("common/db.php");

  $sql = "SELECT * FROM category";
  $result = $conn->query($sql);
  foreach ($result as $row) {
    echo "<option value='" . $row['name'] . "'>" . ucwords($row['name']) . "</option>";
  }
  ?>
</select>
