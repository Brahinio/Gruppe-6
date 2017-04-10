
<!DOCTYPE html>
<html>
<head>
	<title>Prosjekt</title>
    <?php
        require 'headScript.php';
    ?>
    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
    <style>
        #clicktoshow{
            border: none;
            color: white;
            padding: 10px 23px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: #555555;
        }
        #clicktohide{
            border: none;
            color: white;
            padding: 10px 23px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: #555555;
        }
        input[type=checkbox]:not(old){
  width     : 2em;
  margin    : 0;
  padding   : 0;
  font-size : 1em;
  opacity   : 0;
            cursor:pointer;
}
        input[type=checkbox]:not(old) + label{
  display      : inline-block;
  margin-left  : -2em;
  line-height  : 1.5em;
}
        input[type=checkbox]:not(old) + label > span{
  display          : inline-block;
  width            : 0.875em;
  height           : 0.875em;
  margin           : 0.25em 0.5em 0.25em 0.25em;
  border           : 1.2px solid black;
  background       : rgb(224,224,224);
  background-color : white;
  vertical-align   : bottom;
            
}
        input[type=checkbox]:not(old):checked + label > span{
  background-color : white;
}
        input[type=checkbox]:not(old):checked + label > span:before{
  content     : '✓';
  display     : block;
  color       : #4d4d4d;
  font-size   : 20px;
  line-height : 7px;
  text-shadow : 0 0 0.0714em #262626;
  font-weight : 900;
}
        label{
            font-size: 15px;
            padding-left: 10px;
            margin-bottom: 8px;
        }
        
        #textbox{
            width: 170px;
            height: 100px;
            text-align: center;
            border: 3px solid #262626;
            background-color:white;
        }
        
        #textbox:focus {
            outline:none !important;
        }
        
        #submit{
    border: none;
    color: white;
    padding: 10px 23px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #555555;
        }
                .dataadd:focus {
            outline:none !important;
        }
        
        #type:focus{
            outline:none !important;
        }
        
                #submit:focus{
            outline:none !important;
        }
        
                #save:focus{
            outline:none !important;
        }
        
        .dataadd{
            margin-top:10px;
            margin-bottom: 10px;
        }
        #type{
            width:150px;
            margin-bottom:10px;
        }
        #save{
    border: none;
    color: white;
    padding: 5px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #555555;
        }
    #type * {
        background-color:#DCDCDC;
        color:#555555;
        border: 1px solid black; 
    }
    #description{
        resize:none;
    }
    #description:focus {
        outline:none !important;
    }
    </style>
</head>
<body>
    
    <div id="wrap">
        
        <?php
            require 'header.php'
        ?>

        <div id="content">

            <h1>Kart</h1>
            <?php
                require 'testkart.php';
            ?>

        </div>
        
        
        
    </div>
</body>
</html>