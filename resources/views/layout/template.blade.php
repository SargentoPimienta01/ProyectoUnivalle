<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Century-gothic", sans-serif;
        }

        :root {
            --white-color: #171819;
            --blue-color: #f13a11;
            --grey-color: #ffffff;
            --grey-color-light: #aaa;
        }

        body {
            background-color: #e7f2fd;
            transition: all 0.5s ease;
        }
        .contenido{
            transition: all 0.5s ease;
        }

        body.dark {
            background-color: #333;
        }

        body.dark {
            --white-color: #333;
            --blue-color: #fff;
            --grey-color: #f2f2f2;
            --grey-color-light: #aaa;
        }

        /* navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            left: 0;
            background-color: var(--white-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            z-index: 1000;
            box-shadow: 0 0 2px var(--grey-color-light);
        }

        .logo_item {
            display: flex;
            align-items: center;
            column-gap: 10px;
            font-size: 22px;
            font-weight: 500;
            color: var(--blue-color);
        }

        .navbar img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .search_bar {
            height: 47px;
            max-width: 430px;
            width: 100%;
        }

        .search_bar input {
            height: 100%;
            width: 100%;
            border-radius: 25px;
            font-size: 18px;
            outline: none;
            background-color: var(--white-color);
            color: var(--grey-color);
            border: 1px solid var(--grey-color-light);
            padding: 0 20px;
        }

        .navbar_content {
            display: flex;
            align-items: center;
            column-gap: 25px;
        }

        .navbar_content i {
            cursor: pointer;
            font-size: 20px;
            color: var(--grey-color);
        }

        /* sidebar */
        .sidebar {
            background-color: var(--white-color);
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding: 80px 20px;
            z-index: 100;
            overflow-y: scroll;
            box-shadow: 0 0 1px var(--grey-color-light);
            transition: all 0.5s ease;
        }

        .sidebar.close {
            padding: 60px 0;
            width: 80px;
        }

        .sidebar::-webkit-scrollbar {
            display: none;
        }

        .menu_content {
            position: relative;
        }

        .menu_title {
            margin: 15px 0;
            padding: 0 20px;
            font-size: 18px;
        }

        .sidebar.close .menu_title {
            padding: 6px 30px;
        }

        .menu_title::before {
            color: var(--grey-color);
            white-space: nowrap;
        }

        .menu_dahsboard::before {
            content: "Dashboard";
        }

        .menu_editor::before {
            content: "Editor";
        }

        .menu_setting::before {
            content: "Setting";
        }

        .sidebar.close .menu_title::before {
            content: "";
            position: absolute;
            height: 2px;
            width: 18px;
            border-radius: 12px;
            background: var(--grey-color-light);
        }

        .menu_items {
            padding: 0;
            list-style: none;
        }

        .navlink_icon {
            position: relative;
            font-size: 22px;
            min-width: 50px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 6px;
        }

        .navlink_icon::before {
            content: "";
            position: absolute;
            height: 100%;
            width: calc(100% + 100px);
            left: -20px;
        }

        .sidebar .nav_link {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 4px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--grey-color);
            white-space: nowrap;
        }

        .sidebar.close .navlink {
            display: none;
        }

        .nav_link:hover {
            transform: scale(1.1);
            color: var(--grey-color);
            background: var(--blue-color);
        }

        .sidebar.close .nav_link:hover {
            background: var(--white-color);
        }

        .submenu_item {
            cursor: pointer;
        }

        .submenu {
            display: none;
        }

        .submenu_item .arrow-left {
            position: absolute;
            right: 10px;
            display: inline-block;
            margin-right: auto;
        }

        .sidebar.close .submenu {
            display: none;
        }

        .show_submenu~.submenu {
            display: block;
        }

        .show_submenu .arrow-left {
            transform: rotate(90deg);
        }

        .submenu .sublink {
            padding: 15px 15px 15px 52px;
        }

        .bottom_content {
            position: fixed;
            bottom: 60px;
            left: 0;
            width: 260px;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .bottom {
            position: absolute;
            display: flex;
            align-items: center;
            left: 0;
            justify-content: space-around;
            padding: 18px 0;
            text-align: center;
            width: 100%;
            color: var(--grey-color);
            border-top: 1px solid var(--grey-color-light);
            background-color: var(--white-color);
        }

        .bottom i {
            font-size: 20px;
        }

        .bottom span {
            font-size: 18px;
        }

        .sidebar.close .bottom_content {
            width: 50px;
            left: 15px;
        }

        .sidebar.close .bottom span {
            display: none;
        }

        .sidebar.hoverable .collapse_sidebar {
            display: none;
        }

        #sidebarOpen {
            display: none;
        }

        @media screen and (max-width: 768px) {
            #sidebarOpen {
                font-size: 25px;
                display: block;
                margin-right: 10px;
                cursor: pointer;
                color: var(--grey-color);
            }

            .sidebar.close {
                left: -100%;
            }

            .search_bar {
                display: none;
            }

            .sidebar.close .bottom_content {
                left: -100%;
            }
        }

        .contenido {
            margin-top: 105px;
            padding-left: 300px;
        }

        .contClose {
            padding-left: 120px;
        }

        input[type="search"] {
         border: 1px solid #cccccc;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         width: 400px;

}

    </style>
</head>
<body>
@yield('contenido')
<!--
<div class="nav-contenedor">
            
            <nav class="navbar">
                <div class="logo_item">
                    <i class="bx bx-menu" id="sidebarOpen"></i>
                   <h4>EL TEMPLO FITNESS</h4>
                </div>
                <div class="navbar_content">
                    <a class="btn btn-primary p-2" href="">Mi Perfil</a>

                    <a id="cerrarSesion" class="btn btn-danger p-2"><i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar Sesion</a>

                </div>
            </nav>
           
            <nav class="sidebar">
                <div class="menu_content">
                    <ul class="menu_items">
                        <div class="menu_title menu_dahsboard"></div>
                        
                        <li class="item home">
                            <div class="nav_link submenu_item p-2">
                                <span class="navlink_icon">
                                    <i class="bx bx-home-alt"></i>
                                </span>
                                <span class="navlink">Home</span>
                            </div>
                        </li>
                        
                        
                        <li class="item usuarios">
                            <div href="#" class="nav_link submenu_item p-2">
                                <span class="navlink_icon">
                                    <i class="bx bx-user"></i>
                                </span>
                                <span class="navlink">Usuarios</span>
                            </div>
                        </li>
                       
                        <li class="item usuarios">
                            <div href="#" class="nav_link submenu_item p-2">
                                <span class="navlink_icon">
                                    <i class="bx bx-user"></i>
                                </span>
                                <span class="navlink">Productos</span>
                            </div>
                        </li>
                    </ul>

                    
                    <div class="bottom_content">
                        <div class="bottom expand_sidebar">
                            <span> Expand</span>
                            <i class='bx bx-log-in'></i>
                        </div>
                        <div class="bottom collapse_sidebar">
                            <span> Contraer</span>
                            <i class='bx bx-log-out expandir'></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <form id="formCS" action="{{ url('user/logOut') }}" method="POST">
            @csrf
        </form>
        <div class="container-fluid contenido">
            @yield('dashOpt')
        </div>
-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

