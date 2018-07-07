<?php
if ($result = $mysqli->query("SELECT * FROM orders ORDER BY o_id")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    ?> <a href="?p=orders" class="top">
       <?php printf(" %d orders |\n", $row_cnt); ?>
     </a>
       <?php

    /* close result set */
    $result->close();
}?><?php

if ($result = $mysqli->query("SELECT * FROM drivers ORDER BY d_id")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    ?> <a href="?p=drivers" class="top">
       <?php printf(" %d  Drivers |\n", $row_cnt); ?>
     </a>
       <?php

}

if ($result = $mysqli->query("SELECT * FROM trucks ORDER BY t_id")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;
    ?> <a href="?p=trucks" class="top">
       <?php printf(" %d Trucks |\n", $row_cnt); ?>
     </a>
       <?php
}

if ($result = $mysqli->query("SELECT * FROM users WHERE role = 'customer' ORDER BY id")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;
    ?> <a href="?p=customers" class="top">
       <?php printf(" %d Cutomers |\n", $row_cnt); ?>
     </a>
       <?php
}

if ($result = $mysqli->query("SELECT * FROM comments ORDER BY `msg_id` DESC")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;
    ?> <a href="?p=comments" class="top">
       <?php printf(" %d Comments |\n", $row_cnt); ?>
     </a>
       <?php

    /* close result set */
    $result->close();
}
 ?>
