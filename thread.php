<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


        <!--- CSS -->
        
        <link rel="stylesheet" href="partials/media.css">


    <title>i-Fourm!</title>
</head>

<body>

    <?php include 'partials/_header.php'   ?>
    <?php include 'partials/_dbconnect.php'   ?>

    <?php
   $id = $_GET['threadid'];
    $sql= "SELECT * FROM `threads` WHERE  thread_id = $id";
    $result = mysqli_query($conn , $sql);
    
    while($row = mysqli_fetch_assoc($result)){
    
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];

    }


    
    
    ?>

    
<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        // Insert the thread in database

        $comment = $_POST['comment']; 
       

        $sql= "INSERT INTO `comments` ( `comment_content`,  `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn , $sql);
        $showAlert = true;

        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Comment has been  Added.Please wait for cummunity to respond  
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

    ?>


    <div class="container my-4">

        <div class="card text-center">

            <div class="card-body">
                <h2 class="display-4"> <?php echo $title;?></h2>
                <p class="lead"> <?php echo $desc; ?>..</p>
                <hr class="my-4">
                <p>This is pear to pear forum for sharing knowledge with each other.<br><br>
                Forum Rules -->.    
                 No Spam / Advertising / Self-promote in the forums not allowed.<br>
                These forums define spam as unsolicited advertisement for goods, 
                services and/or other web sites, or posts with little, 
                or completely unrelated content. <br>
                Do not spam the forums with links to your site or product, 
                or try to self-promote your website, business or forums etc </p>
               

                <p class="pname"><b>Posted by: SRK</b></p>
            </div>

        </div>

        
        <div class="container">

            <h1 class="py-2">Post a Comment!</h1>

            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                
                <div class="form-group">
                    <label for="floatingTextarea">Type your Comment</label> 
                    <textarea class="form-control" name="comment"  id="comment"></textarea>

                </div>

                <button type="submit" class="btn btn-success  mt-2 mb-4 ">Post Comment</button>
            </form>
        </div>

        <div class="container" id="ques">
            <h1 class="py-2">Discussion</h1>
            <?php

           $id = $_GET['threadid'];
           
            $sql =  " SELECT * FROM `comments` WHERE thread_id = $id ";

            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
               
            echo '<div class="media" my-3>
                <img src="img/user.jpg" width="45px" class="mr-5" alt="">
                
                <div class="media-body ">
                <p class = "font-weight-bold my-0">Anonymous </p>
                  
                 
                   '.$content.'

                </div>

            </div>';
            }

            if($noResult){
                //echo '<b>Be the First person to ask a question! <b>';

                
                
                echo'<div class = "jumbotron jumbotron-fluid mt-4">
                        <div class="container">
                        <p class = "display-4" > No Thread found! </p>
                        <p class = "lead"> Be the first person to ask a question </p>
                        </div>
                    </div>';
            }



            ?>  
        </div>



    </div>







    <?php include 'partials/_footer.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>