<?php

require("header.php");
    $sql = "SELECT entries.*, categories.cat FROM entries, categories
    WHERE entries.cat_id = categories.id
    ORDER BY dateposted DESC
    LIMIT 1;";

    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo "<h2 id='title'><a href='viewentry.php?id=" . $row['id'] . "'>" . $row['subject'] . "</a></h2><br />";

    echo "<p id='byline'>In <a href='viewcat.php?id=" . $row['cat_id'] ."'>" . $row['cat'] ."</a> - Posted on <span class='datetime'>" . date("D jS F Y g.iA", strtotime($row['dateposted'])) ."</span></p>";
    
    echo "<p id='entrybody'>";
    echo nl2br($row['body']);
    echo "</p>"
        
require("footer.php");