<?php
if (isset($_POST['submittodo'])) {
    $newtache = new TacheController();
    $newtache->addtache();
}
if (isset($_POST['submitsearch'])) {
    $tout = new TacheController();
    $touts=$tout->getAllTachesearch();
}else{
    $tout = new TacheController();
    $touts = $tout->getAllTaches();
}

if (isset($_POST['submitchange'])) {
    $newtache = new TacheController();
    $newtache->updatetache();
}




?>
<!-- navbar start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                          
                  

                    <li class="nav-item dropdown" style="list-style-type:none;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo "welcome ".$_SESSION['name_user'];?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout">logout</a></li>
                        </ul>
                    </li>
                    <form class="d-flex" method="POST" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button hidden class="btn" type="submit" name="submitsearch" value="search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></button>
                    </form>

                </div>
            </div>
        </nav>
<!-- navbar end -->
<!-- TO DO START  -->

        <div class="backgroundimg " style="min-height: 100vh; background-image:url('<?= BASE_URL ?>/views/public/img/cf6d13d6a2e4b198043f077ebd416589.jpg'); background-repeat:no-repeat;background-size:cover;padding-top: 50px;">
        <div class="cards">
            <div class="card  mb-3 " style="max-width: 18rem; min-width:18rem;">
                <div class="card-header ">
                    <div class="bettwen">
                    <?php $j=0; foreach ($touts as $toutt) :
            if($toutt['status']==='todo') { $j++;}endforeach; ?>
                        <button type="button" class="btn mb-3  " >TO DO (<?php echo $j;?>)</button>
                        <button type="button" class="btn btn-sm mb-3 d-block d-sm-none" onclick="myFunction('todocontent')">-</button>
                    </div>
                </div>
                <div id="todocontent" class="  todoshow ">


                    <?php foreach ($touts as $toutt) :
                        if($toutt['status']==='todo') {?>
                        <div class="card-body ">
                            <div class="tachex border p-2">
                                
                                <div class="buttonud d-flex flex-row justify-content-end " >
                                    <form class="ml-2" method="POST" >
                                        <input type="hidden" name="id_tache" value="<?php echo $toutt['id_tache']; ?>">
                                        
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $toutt['id_tache']; ?>" data-bs-whatever="@getbootstrap">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                        </button>
                                        <div class="modal fade" id="exampleModal<?php echo $toutt['id_tache']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">update task to do</h1>
                    </div>
                    <form method="POST">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">date:</label>
                                <input type="date" min="2023-01-23" class="form-control" value="<?php echo $toutt['date_tache'];?>" name="date_tache" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                
                            <select class="form-select"  name="status" aria-label="Default select example"  >
                                
                                <option value="todo" selected >todo</option>
                                <option value="doing">doing</option>
                                <option value="done">done</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">description:</label>
                                <input type="text" class="form-control" value="<?php echo $toutt['descrip_tache'];?>" name="descrip_tache" id="message-text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submitchange" class="btn btn-primary">message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
                                    </form>
                                    <form method="POST" action="delete">
                                        <input type="hidden" name="id_tache" value="<?php echo $toutt['id_tache']; ?>">
                                        <button type="submit" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                        
                                        </button>

                                    </form>

                                </div>
                                <h5> <?php echo $toutt['descrip_tache'] ?></h5>
                            </div>
                        </div>
                    <?php }endforeach; ?>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@getbootstrap">ADD TASK +</button>

                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">add task to do</h1>
                            </div>
                            <form method="POST">
                                <div class="modal-body    ">
                                    <div class="form-fieldset">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">date:</label>
                                        <input type="date" min="2023-01-23" class="form-control" name="date_tache[]" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">description:</label>
                                        <input type="text" class="form-control" name="descrip_tache[]" id="message-text">
                                        <input type="hidden" class="form-control" name="status[]" value="todo" id="message-text">

                                    
                                    </div></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="add-more btn btn-secondary">Add More</button>
                                    <button type="submit" name="submittodo" class="btn btn-primary">message</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
<!-- TO DO END  -->
<!-- DOING START  -->

    <div class="card  mb-3 " style="max-width: 18rem;min-width:18rem;">
        <div class="card-header ">
            <div class="bettwen">
            <?php $k=0; foreach ($touts as $toutt) :
            if($toutt['status']==='doing') { $k++;}endforeach; ?>
                <button type="button" class="btn  mb-3  " >DOING (<?php echo $k;?>)</button>
                <button type="button" class="btn btn-sm mb-3 d-block d-sm-none " onclick="myFunction('doingcontent')">-</button>
            </div>
        </div>
        <div id="doingcontent" class="  todoshow ">


            <?php foreach ($touts as $toutt) : 
                if($toutt['status']==='doing') { ?>
                
                <div class="card-body ">
                    <div class="tachex border p-2">
                        
                        <div class="buttonud d-flex flex-row justify-content-end " >
                            <form class="ml-2" method="POST" action='?'>
                                

                                <input type="hidden" name="id_tache" value="<?php echo $toutt['id_tache']; ?>">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $toutt['id_tache']; ?>" data-bs-whatever="@getbootstrap">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                </svg>
                                </button>
                                
        <div class="modal fade" id="exampleModal<?php echo $toutt['id_tache']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">update task doing</h1>
                    </div>
                    <form method="POST">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">date:</label>
                                <input type="date" min="2023-01-23" class="form-control" value="<?php echo $toutt['date_tache'];?>" name="date_tache" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                
                            <select class="form-select"  name="status" aria-label="Default select example"  >
                               
                                <option value="todo" >todo</option>
                                <option value="doing" selected >doing</option>
                                <option value="done">done</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">description:</label>
                                <input type="text" class="form-control" value="<?php echo $toutt['descrip_tache'];?>" name="descrip_tache" id="message-text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submitchange" class="btn btn-primary">message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
                            </form>
                            <form method="POST" action="delete">
                                <input type="hidden" name="id_tache" value="<?php echo $toutt['id_tache']; ?>">
                                <button type="submit" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                
                                </button>
                            </form>

                        </div>
                        <h5> <?php echo $toutt['descrip_tache'] ?></h5>
                    </div>
                </div>
            <?php } endforeach; ?>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@getbootstrap">ADD TASK +</button>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> add task doing</h1>
                    </div>
                    <form method="POST">
                    <div class="modal-body    ">
                                    <div class="form-fieldset">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">date:</label>
                                        <input type="date" min="2023-01-23" class="form-control" name="date_tache[]" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">description:</label>
                                        <input type="text" class="form-control" name="descrip_tache[]" id="message-text">
                                        <input type="hidden" class="form-control" name="status[]" value="doing" id="message-text">

                                    
                                    </div></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="add-more btn btn-secondary">Add More</button>
                                    <button type="submit" name="submittodo" class="btn btn-primary">message</button>
                                </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
<!-- DOING END  -->
<!-- DONE START  -->

        <div class="card  mb-3 " style="max-width: 18rem; min-width:18rem;">
            <div class="card-header ">
            <?php $t=0; foreach ($touts as $toutt) :
            if($toutt['status']==='done') { $t++;}endforeach; ?>
                <div class="bettwen">
                    <button type="button" class="btn  mb-3  " >DONE(<?php  echo $t; ?>)</button>
                    <button type="button" class="btn btn-sm mb-3 d-block d-sm-none" onclick="myFunction('donecontent')">-</button>
                </div>
            </div>
            <div id="donecontent" class="  todoshow ">


                <?php foreach ($touts as $toutt) : 
                    if($toutt['status']==='done') { ?>
                    <div class="card-body ">
                        <div class="tachex border p-2">
                            
                            <div class="buttonud d-flex flex-row justify-content-end " >
                                <form class="ml-2" method="POST" >
                                    <input type="hidden" name="id_tache" value="<?php echo $toutt['id_tache']; ?>">
                                    
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $toutt['id_tache']; ?>" data-bs-whatever="@getbootstrap">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg>
                                    </button>
                                    <div class="modal fade" id="exampleModal<?php echo $toutt['id_tache']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">update task done </h1>
                    </div>
                    <form method="POST">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">date:</label>
                                <input type="date" min="2023-01-23" class="form-control" value="<?php echo $toutt['date_tache'];?>" name="date_tache" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                
                            <select class="form-select"  name="status" aria-label="Default select example"  >
                                
                                <option value="todo" >todo</option>
                                <option value="doing">doing</option>
                                <option value="done" selected>done</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">description:</label>
                                <input type="text" class="form-control" value="<?php echo $toutt['descrip_tache'];?>" name="descrip_tache" id="message-text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submitchange" class="btn btn-primary">message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
                                </form>
                                <form method="POST" action="delete">
                                    <input type="hidden" name="id_tache" value="<?php echo $toutt['id_tache']; ?>">
                                    <button type="submit" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    
                                    </button>
                                </form>

                            </div>
                            <h5> <?php echo $toutt['descrip_tache'] ?></h5>
                        </div>
                    </div>
                <?php }endforeach; ?>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="@getbootstrap">ADD TASK +</button>

            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">add task done</h1>
                        </div>
                        <form method="POST">
                        <div class="modal-body    ">
                                    <div class="form-fieldset">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">date:</label>
                                        <input type="date" min="2023-01-23" class="form-control" name="date_tache[]" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">description:</label>
                                        <input type="text" class="form-control" name="descrip_tache[]" id="message-text">
                                        <input type="hidden" class="form-control" name="status[]" value="done" id="message-text">

                                    
                                    </div></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="add-more btn btn-secondary">Add More</button>
                                    <button type="submit" name="submittodo" class="btn btn-primary">message</button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>


<!-- DONE END  -->
