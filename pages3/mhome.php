<div class="container">
  <div class="col-md-4">
	  <div class="well well-lg wll wll-c1">
			<div class="">
        <a href="?p=orders">
				<?php

				if ($result = $mysqli->query("SELECT * FROM orders ORDER BY o_id")) {

						/* determine number of rows result set */
						$row_cnt = $result->num_rows;

						printf(" %d orders\n", $row_cnt);

						/* close result set */
						$result->close();
				}

				?><br>
				</a>
			</div>
		</div>

	  <div class="well well-lg wll wll-c2">
      <a href="?p=drivers">
			<?php
			if ($result = $mysqli->query("SELECT * FROM drivers ORDER BY d_id")) {

					/* determine number of rows result set */
					$row_cnt = $result->num_rows;

					printf(" %d  Drivers\n", $row_cnt);

			}

			?>
			<br>
			</a>
		</div>

	  <div class="well well-lg wll wll-c3">
      <a href="?p=trucks">
			<?php
			if ($result = $mysqli->query("SELECT * FROM trucks ORDER BY t_id")) {

					/* determine number of rows result set */
					$row_cnt = $result->num_rows;

					printf(" %d Trucks\n", $row_cnt);
			}
			?><br>
			</a>
		</div>
  </div>

	<div class="col-md-4">
	  <div class="well well-lg wll wll-c4">
      	<a href="?p=customers">
      <?php
			if ($result = $mysqli->query("SELECT * FROM users WHERE role = 'customer' ORDER BY id")) {

					/* determine number of rows result set */
					$row_cnt = $result->num_rows;

					printf(" %d Cutomers\n", $row_cnt);
			}
			?><br>
		</a>
		</div>

		<div class="well well-lg wll wll-c5">
      <a href="?p=comments">
      <?php
			if ($result = $mysqli->query("SELECT * FROM comments ORDER BY `msg_id` DESC")) {

					/* determine number of rows result set */
					$row_cnt = $result->num_rows;

					printf(" %d Comments\n", $row_cnt);

					/* close result set */
					$result->close();
			}
			?><br>
			</a>
		</div>

	  <div class="well well-lg wll wll-c3">
		<a href="?p=add_admin">Administrator</a>
		</div>
  </div>
</div>
