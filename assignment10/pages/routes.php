<?php

$path = "index.php?page=welcome";
$login = "index.php?page=login";




    


$nav=<<<HTML
    <nav>
        
            <a href="index.php?page=welcome">Welcome    </a>
            <a href="index.php?page=addContact">    Add Contacts    </a>
            <a href="index.php?page=deleteContacts">    Delete contact(s)  </a>
            <a href="index.php?page=addAdmin">    Add Admin  </a>
            <a href="index.php?page=deleteAdmin">    Delete Admin  </a>
            <a href="index.php?page=logout">    Logout</a>
    </nav>
HTML;

$navStaff=<<<HTML
    <nav>
        
            <a href="index.php?page=welcome">Welcome    </a>
            <a href="index.php?page=addContact">    Add Contacts    </a>
            <a href="index.php?page=deleteContacts">    Delete contact(s)  </a>
            <a href="index.php?page=logout">    Logout</a>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "login"){
        require_once('pages/login.php');
        
    }
    
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }
    
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();

    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $result = init();

    }
    else if($_GET['page'] === "deleteAdmin"){
        require_once('pages/deleteAdmin.php');
        $result = init();

    }
    else if($_GET['page'] === "logout"){
        require_once('./logout.php');
        $result = init();

    }

   
}

else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: '.$path);
}



?>