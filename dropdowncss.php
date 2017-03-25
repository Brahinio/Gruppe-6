
        #dropdowncontent{
            display:<?php echo $menu ?>;
            position: absolute;
            left: 0;
            top: 100px;
            width: 1000px;
            height: 300px;
            background-color: #87CEFA;
            margin-right: auto; 
            margin-left: auto;
            z-index: 1;
            animation-name: menuanim;
            animation-duration: 2s;
        }
        @-webkit-keyframes menuanim {
            from {width:1000px; height:0;}
            to {width:1000px; height:300px;}
        }