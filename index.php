<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Hey, I'm Shane</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Scales the display to the same resolution on all devices-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Style sheet-->
    <style>
        /* pft... Animations */

        @keyframes animationName {
            from {}

            to {}
        }

        /* Desktop */

        desk {
            display: inline;
        }

        tablet,
        mobile {
            display: none;
        }

        sub {
            font-size: 8pt;
        }

        header {
            background: white;
        }

        h1,
        h2,
        h3 {
            background: white;
            text-align: center;
            margin: inherit;
        }

        body,
        html {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        #root {
            /* background: white; */
            padding: 0;
            margin: 0;
            padding-bottom: 50px;
        }

        home {
            height: 200px;
            text-align: center;
        }

        p {
            padding: 25px;
        }

        nav {
            text-align: center;
        }



        li {
            display: inline-block;
            padding: 10px;
            background: black;
        }

        li:hover {
            color: white;
            text-decoration: underline;

        }

        a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        a:hover {
            color: white;
            text-decoration: underline;
        }

        #footer {
            position: fixed;
            text-align: center;
            bottom: 0px;
            width: 100%;
            background: black;
            color: white;
        }

        .socialIcons {
            width: 30px;
            height: 30px;
            padding: 15px;
            display: inline-table;
        }

        .socialIcons:hover {
            width: 35px;
            height: 35px;

        }

        #featureImg {
            position: fixed;
            left: 33%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 33%;
            opacity: .3;
            z-index: -10;
        }

        portfolio,
        blog,
        webapps,
        businesses,
        music,
        tech,
        food,
        research,
        about {
            display: block;
            padding: 20px;
        }

        /* Break for tablet */

        @media screen and (max-width: 800px) {
            desk {
                display: none;
            }

            tablet {
                display: inline;
            }

            body {
                font-size: .9em;
            }

            li {
                background: white;
                color: black;
            }

            li:hover {
                background: black;
            }

            li:active {
                background: black;
                color: black;
            }
        }

        /* Break for Mobile */

        @media screen and (max-width: 500px) {
            tablet {
                display: none;
            }

            mobile {
                display: inline;
            }

            nav {
                position: fixed;
                top: 0px;
                right: 0px;
                width: 200px;
                height: 100%;
                padding-top: 40px;
                background-color: lightsteelblue;
                display: none;
            }

            li {
                display: block;
                text-align: left;
            }

            .socialIcons {
                width: 30px;
                height: 30px;
                padding-top: 10px;
                padding-bottom: 5px;
                padding: 10px
            }

            mobile#menubutton {
                position: fixed;
                top: 0;
                right: 0;
                height: 50px;
                width: 50px;
                opacity: .7;
                cursor: pointer;
            }

            #menubutton img {
                width: inherit;
                height: inherit;
            }

            #underConstruction {
                width: 66%;
            }
        }

        @media screen and (max-width: 450px) {
            #me {
                font-size: 18pt;
                padding-top: 20px;
            }

            .socialIcons {
                padding: 5px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            li {
                font-size: 12pt;
            }
        }
    </style>
</head>

<body>
    <div id="root">
        <header id="navbar">
            <h1 id='me'>Shane Guignard<sub>
                    <desk>Desktop</desk>
                    <tablet>Tablet</tablet>
                    <mobile>Mobile</mobile>
                </sub></h1>
            <scroll></scroll>
            <mobile id='menubutton' onclick='menu(true);'><img src='menu.png'></mobile>
        </header>
        <?php include("nav.php"); ?>
        <hr>
        <home>
            <h3></h3>
            <img id='featureImg' src=''>
            <br>
            <p>Thanks for visiting my site, please feel free to browse around or get in touch with me at any of the
                links below.</p>
        </home>
        <portfolio>
            <h4>Websites</h4>
            <ul>
                <li><a href="http://www.creemoresnhl.com" target="_blank">creemoresnhl.com
                    </a></li>
                    
                <li><a href="https://shaneguignard.github.io/uoftwoodguide/index.html"
                        target="_blank">uoftwooddatabase.com
                    </a></li>
                <li><a href='http://www.apothecarygrove.wordpress.com' target="_blank">Apothecarygrove.com</a></li>
                <li><a href='https://www.thefluorescentlightbulbs.com' target="_blank">thefluorescentlightbulbs.com</a>
                </li>
                <li><a href='https://www.yvha.ca' target="_blank">YVHA.ca (York Village Housing Association)</a>
                </li>

            </ul>

        </portfolio>
        <blog>
            <h4>Blog</h4>
            <p>The Chronicles</p>
        </blog>
        <webapps>
            <?php include("webapps.php");?>
        </webapps>
        <!--
        <businesses>
            <h4>Businesses</h4>
            <p>One day I will business</p>
        </businesses>
-->
        <!--
        <tech>
            <h4>Technology</h4>
            <p>I might fold this into research or vice versa.</p>
        </tech>
-->
        <!--
        <food>
            <h4>Food</h4>
            <p>Who else loves food?</p>
        </food>
-->
        <research>
            <h4>Research</h4>
            <p>Industry 4.0 and the Smart Manufacturing Plant</p>
            <ol>
                <li><a href='research/Industry%204.0/White%20Papers/WP_21_Traceability-In-Manufacturing.pdf'>Traceability
                        in Manufacturing</a>
                </li>
            </ol>
        </research>
        <about>
            <h4>About</h4>
            <p>
                Just an indie developer from a small town trying to make it in the big city. </p>

        </about>
    </div>
    <div id="footer">
        <div>
            <a href='https://www.facebook.com/shaneguignard'><img class='socialIcons' src='facebook.png' /></a>
            <a href='https://www.twitter.com/shaneguignard'><img class='socialIcons' src='twitter.png'></a>
            <a href='https://www.linkedin.com/in/shaneguignard/'><img class='socialIcons' src='linkedin.png'></a>
            <a href='mailto:shaneguignard@gmail.com'><img class='socialIcons' src='mail.png' /></a>
            <a href='https://www.instagram.com/shaneguignard'><img class='socialIcons' src='instagram.png' /></a>
            <a href='https://www.github.com/shaneguignard'><img class='socialIcons' src='github.png' /></a>
            <a href='https://soundcloud.com/shaneguignardmusic'><img class='socialIcons' src='soundcloud.png' /></a>
            <a href='https://www.pinterest.ca/shaneguignard/'><img class='socialIcons' src='pinsterest.png' /></a>

        </div>
    </div>
</body>
<script>
    // Place Javascipt here
    width = window.innerWidth;

    function menu(expand) {
        // Only execute if screen is smaller than mobile break.
        if (width < 500) {
            root = document.getElementById("root");
            mobNav = document.getElementsByTagName('nav')[0];
            menuButton = document.getElementById('menubutton');
            switch (expand) {
                case true:
                    root.style = 'position: relative; left: -200px;';
                    mobNav.style = 'display:block;';
                    menuButton.style = 'display: none;';
                    break;
                case false:
                    root.style = 'position: relative; left: 0px;';
                    mobNav.style = 'display:none;';
                    menuButton.style = 'display: inline;';
                    break;
            }
        }
    }

    function pages(page) {
        switch (page) {
            case "home":
                document.getElementsByTagName('header')[0].scrollIntoView();
                break;
            case "websites":
                document.getElementsByTagName('portfolio')[0].scrollIntoView();
                break;
            case "blog":
                document.getElementsByTagName('blog')[0].scrollIntoView();
                break;
            case "sandbox":
                document.getElementsByTagName('sandbox')[0].scrollIntoView();
                break;
            case "businesses":
                document.getElementsByTagName('businesses')[0].scrollIntoView();
                break;
            case "music":
                document.getElementsByTagName('music')[0].scrollIntoView();
                break;
            case "technology":
                document.getElementsByTagName('tech')[0].scrollIntoView();
                break;
            case "food":
                document.getElementsByTagName('food')[0].scrollIntoView();
                break;
            case "research":
                var x = document.getElementsByTagName('research')[0];
                x.scrollIntoView();
                x.style = "background: black; color: white;";
                break;
            case "about":
                var x = document.getElementsByTagName('about')[0];
                x.scrollIntoView();
                x.style = "background: black; color: white;";
                break;
            case "resume":
                window.location.href = "Resume_WebApplicationDeveloper.pdf";
                break;
        }
    }

    // Parallax Scrolling
    var x = document.getElementById('featureImg');
    window.onscroll = function () {
        x.style = "top: " + (100 + window.pageYOffset / 4) + "px;";

    }
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47081695-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-47081695-2');
</script>


</html>