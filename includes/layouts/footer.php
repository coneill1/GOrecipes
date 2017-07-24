
		</div>
	</body>
	<div id="footer">Copyright <?php echo date("Y"); ?>, GO Recipes</div>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
