
<table>
	<tr>
		<td>#</td>
		<td>User #</td>
		<td>Date</td>
		<td>Page</td>
		<td>Action</td>
		<td>Ip</td>
		<td>Logged</td>
		<td>Session</td>
		<td>Post</td>
		<td>Get</td>
	</tr>
<?php while($res = $infoLog->fetchArray(SQLITE3_ASSOC)): ?>

	<tr>
		<td><?php echo $res['id'];?></td>
		<td><?php echo $res['user_id'];?></td>
		<td><?php echo $res['date_action'];?></td>
		<td><?php echo $res['page'];?></td>
		<td><?php echo $res['action'];?></td>
		<td><?php echo $res['ip'];?></td>
		<td><?php echo ($res['logged'])? 'TRUE' : 'FALSE';?></td>
		<td>
			<pre><?php echo $res['data_session'];?>
			</pre>
		</td>
		<td>
			<pre><?php echo $res['data_post'];?>
			</pre>
		</td>
		<td>
			<pre><?php echo $res['data_get'];?>
			</pre>
		</td>
	</tr>
	<?php echo $res['id'];?>
<?php endwhile; ?>
</table>