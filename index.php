<?php include('inc/header.php'); ?> 
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<title>Title</title>
    </head> 
<body> 
 <!-- CODE HERE   -->
    <div class="container">
        <?php include('inc/nav.php') ?>  <!-- Navigation -->
        
    <!-- CODE HERE....  -->
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Data</div>
                    <div div class="panel-body"> 
                        <form>
                            <div class="form-group">
                                <label>First Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="First Name."
                                />
                            </div> 
                            <div class="form-group">
                                <label>Last Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Last Name">
                            </div> 

                            <button type="submit" class="btn btn-default">ADD</button>
                        </form>
                    </div>
                </div> 
            </div>               
        </div>
    </div>

 
<!-- ============================ FOOTER  -->
<?php include('inc/footer.php'); ?>