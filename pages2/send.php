
  <style>
  #myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: lightgreen;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 4px;
  }

  #myBtn:hover {
    background-color: #555;
  }
	p{
		color: #fff;
		font-size: 20px;
		width: 420px;
	}
  </style>


<section>
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


      <div class="card-body">
        <div class="">
          <?php
          $mysqli = new mysqli("localhost","root","","transit");
          if ($mysqli->connect_errno) {
            echo "Failed connect (".$mysqli->connect_errno.")".$mysqli->connect_errno;
          }
          $query = $mysqli->query("SELECT uname,msg,c_date FROM comments ORDER BY `msg_id` DESC");
          while($row = $query->fetch_assoc()){
            ?>
                <div class="container">
                  <h3><code><?php echo $row['uname']; ?></code>&nbsp;&nbsp;:
										<?php echo $row['c_date']; ?></h3>
									<p><?php echo $row['msg']; ?></p>
									<hr>
                </div>
            <?php
            }
             ?>
        </div>
      </div>
    </div>
</section>



  <script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
      } else {
          document.getElementById("myBtn").style.display = "none";
      }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
  }
  </script>
