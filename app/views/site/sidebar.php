<div class="right_side">
      <div class="nav">
        <h2>Past Articles</h2>
        <ul>
        <?php 
          foreach ($recentposts as $row) {
                echo "<li><a href='";
                echo base_url();
                echo 'post/index/'.$row->postId;
                echo "'>";
                echo substr($row->title,0,25);
                echo "</a></li>";  
          }
        ?>
        </ul>
        
        <br />

        
      </div>
</div>