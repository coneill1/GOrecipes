
		</div>
		<script src="../includes/layouts/Javascript/jquery-3.2.1.js"></script>
		<script src="../includes/layouts/Javascript/bootstrap.min.js"></script>
		
	</body>
	<div id="footer">Copyright <?php echo date("Y"); ?>, GO Recipes</div>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
