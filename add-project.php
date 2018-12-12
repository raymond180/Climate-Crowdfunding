<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap datetime picker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="./styles/styles.css">
		<title>Climate Crowdfunding</title>
	</head>
	<body>
	<!-- Navbar Start --><?php require_once'navbar.php'; ?><!-- Navbar End -->
            
        <!-- Main Content Start -->
        <main role="main">
            <!-- Container Start -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-5 text-center">
                        <h2>Add Project</h2>
                    </div><!-- /.col -->
                    <div class="col-md-12">
                        <form method="GET" action="process-add-project.php">
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="projectName">Project Name</label>
                                <input type="text" class="form-control" id="projectName" placeholder="Project Name" name="projectName">
                            </div>
                            <div class="form-group">
                                <label for="projectSummery">Project Summery</label>
                                <textarea class="form-control" id="projectSummery" rows="3" name="projectSummery"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="projectDescription">Project Description</label>
                                <textarea class="form-control" id="projectDescription" rows="6" name="projectDescription"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$ Target Amount</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="targetAmount">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="input-group date pt-3" data-provide="datepicker">
                                <label for="projectStartDate">Project Start Date</label>
                                <input type="text" class="form-control" name="projectEndDate">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <div class="input-group date pt-3 pb-5" data-provide="datepicker">
                                <label for="projectEndDate">Project End Date</label>
                                <input type="text" class="form-control" name="projectEndDate">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right" type='submit' name='submit'> Create Project </button>
                        </form>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /. container -->
        </main>
        <!-- Main Content End -->
        
        <!-- Footer Start --><?php require_once'footer.php'; ?><!-- Footer End -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then datetime picker, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
            $('.datepicker').datepicker();
        </script>
</body>
</html>