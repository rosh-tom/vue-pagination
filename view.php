<?php include('inc/header.php'); ?> 
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<title>Pagination</title>
    </head> 
<body> 
 <!-- CODE HERE   -->
    <div class="container">
        <?php include('inc/nav.php') ?>  <!-- Navigation -->
        
        <!-- CODE HERE....  -->
        <div id = 'view'>
            <div class="row">
                <div class="col-sm-3"> 
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Achieved Todo List 
                        </div>
                        <div class="panel-body"> 

                            <select 
                                class="form-control"  
                                @change="onChange($event)"
                                v-model="selected"
                            >
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option> 
                            </select>
                           
                            <div class="table-responsive">
                                <table class="table table-hover" style="margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="data in datas"> 
                                             <td>{{ data.id }}</td>  
                                            <td>{{ data.firstname }}</td>  
                                            <td>{{ data.lastname }}</td>  
                                        </tr>  
                                    </tbody> 
                                </table>  
                            </div>
                        </div>
                        <div class="panel-footer"> 
                            <!-- <ul class="pagination"> 
                                <?php 
                                    // if(isset($_SESSION['numberOfPages'])){ 
                                    //     for($page = 1; $page <=  $_SESSION['numberOfPages']; $page++){
                                ?>
                                    <li class="page-item"><a class="page-link" href="#" v-on:click="changePage(<?= $page ?>)"><?= $page ?></a></li>
                               <?php  
                                    //     }
                                    // }

                                ?>
                    
                            </ul> -->
                            


                            <ul class="pagination">
                                <li class="page-item" v-for="number in pages">
                                <a class="page-link" href="#" v-on:click="changePage(number)">{{ number }}</a></li> 
                            </ul>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- #view  -->
        

    </div>  
    <!-- .container  --> 

<!-- ============================ FOOTER  -->
<?php include('inc/footer.php'); ?>

<script>
    var app = new Vue({
        el: '#view',
        data: { 
            datas: '',
            selected: '5',
            page: '1',
            pages: '',
        },
        methods: {
            fetchDatas: function(){
                axios.post('actions/vue.php', {
                    ax_page: this.page,
                    ax_numberPerPage: this.selected, 
                    action: 'fetchDatas'
                }).then(function(response){
                    app.datas = response.data.datas; 
                    app.pages = response.data.numberOfPages;
                });
            },
            onChange(event){ 
                app.page = 1;
                app.fetchDatas();
            },
            changePage: function(page){
                app.page = page;
                app.fetchDatas();
            }
        },
        created: function(){ 
            this.fetchDatas();
        }
    });


</script>