
		</div>
		<script src="Javascript/jquery-3.2.1.js"></script>
		<script src="Javascript/boostrap.min.js"></script>
		<script src="Javascript/script.js"></script>
		
	</body>
	<div id="footer">Copyright <?php echo date("Y"); ?>, GO Recipes</div>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
