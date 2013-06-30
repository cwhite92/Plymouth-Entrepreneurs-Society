<p>Hello <?php echo $to; ?>,</p>

<p><?php echo $from; ?> just sent you this message through With A Spark:</p>

<p><?php echo htmlspecialchars($message); ?></p>

<p>To reply to this message, visit this member through their profile at:</p>

<p><a href="//withaspark.co.uk/profile/<?php echo $toId; ?>">withaspark.co.uk/profile/<?php echo $toId; ?></a></p>