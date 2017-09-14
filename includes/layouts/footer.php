                </div> <!-- column -->
            </div> <!-- row -->
		</div> <!-- container -->
        <script src="../includes/layouts/Javascript/tether.min.js"></script>
		<script src="../includes/layouts/Javascript/jquery-3.2.1.js"></script>
        <script src="../includes/layouts/Javascript/admin_script.js"></script>
		<script src="../includes/layouts/Javascript/bootstrap.min.js"></script>
		
	</body>
    <footer class="footer">
        <div class="container text-center">
           <span>Copyright <?php echo date("Y"); ?>, GO Recipes</span>
        </div>
    </footer>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
