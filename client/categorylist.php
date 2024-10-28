<div class="container mt-3">
  <?php
  include("common/db.php");
  $sql = "SELECT * FROM category";
  $result = $conn->query($sql);
  if ($result) {
    echo '<div class="list-group">';
    foreach ($result as $row) {
      echo '<a 
      href="?category_id='.$row['id'].'" class="list-group-item list-group-item-action">' . ucwords($row['name']) . '</a>';
    }
    echo '</div>';
  }
  ?>
</div>
