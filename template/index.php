<?php

    if($page == "login"){
        if(isset($_SESSION['admin_user_info'])){
            header("Location: ".BASE_URL."home");	
            exit();
        }else{
            include_once( $page . ".php" );
        }
    }else{
        if(isset($_SESSION['admin_user_info'])){
            if($page == "pdf_template"){
                include_once( $page . ".php" );
            }else{
                include_once( "header.php" );
                include_once( "sidebar.php" );
                include_once( $page . ".php" );
                include_once( "footer.php" );
            }
            
        }else{
            header("Location: ".BASE_URL."login");	
            exit();
        }
       
    }
