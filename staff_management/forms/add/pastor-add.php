<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

<html>

    <head>
        <title>Add a pastor</title>

        <link rel="stylesheet" type = "text/css" media = "all" href="../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo_clear.png" type="image/x-icon">
    </head>

    <body>
    
    <div class="top-menu" id="top-menu">

        <div class="top-init" id="top-init">
            <div class="icon-box">
                <img src="../../../images/logo_clear.png" alt="" id="top-logo">
            </div>

            <div class="context-box">
                <div class="menu-button" id ="menu-button">
                    <img src="../../../images/menu.png" alt="" id="menu-icon" onclick="expandMenu()">
                </div>
                <p class="page-label">Add a pastor</p>
            </div>
        </div>

        <div class="top-actions" id = "mobile-bottom">
            <!-- <a href="" class="logout-button">
                <div class="logout-button-box">
                    logout
                </div>
            </a>
            <p id = "username">Username</p> -->
        </div>

        <div class="top-menu-list">
            
            <div class="menu-category">
                <a href="../../navigation/audit.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Audit</p>
                        <img src="../../../images/audit.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="../../navigation/events.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Events</p>
                        <img src="../../../images/events.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="../../navigation/reservations.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Reservations</p>
                        <img src="../../../images/registrants.png" alt="" id="item-icon">
                    </div>
                </a>
            </div>

            <div class="break"></div>

            <div class="menu-category">
                <a href="../../navigation/members.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Members</p>
                        <img src="../../../images/member.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="../../navigation/staffs.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Staffs</p>
                        <img src="../../../images/staff.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="../../navigation/pastors.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Pastors</p>
                        <img src="../../../images/pastor.png" alt="" id="item-icon">
                    </div>
                </a>
            </div>

            <div class="break"></div>

            <div class="menu-category">
                <a href="../../navigation/branches.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Branches</p>
                        <img src="../../../images/branch.png" alt="" id="item-icon">
                    </div>
                </a>
            </div>

        </div>

    </div>
        
        <div class="content-box" id = "main-content">

            <div class="side-menu" id="side-menu">

                <div class="branding">
                    <img id = "brand-logo" src="../../../images/logo_clear.png" alt="CESCON logo">
                    <p id="brand-name">CESCON</p>
                </div>

                <div class="menu-list">

                    <a href="../../navigation/audit.php" class="menu-link" id="menu-link">
                        <div class="link-box event-menu-item">
                            <img src="../../../images/audit.png" alt="" id="item-icon">
                            <p>Audit</p>
                        </div>
                    </a>

                    <a href="../../navigation/events.php" class="menu-link" id="menu-link">
                        <div class="link-box event-menu-item">
                            <img src="../../../images/events.png" alt="" id="item-icon">
                            <p>Events</p>
                        </div>
                    </a>

                    <a href="../../navigation/reservations.php" class="menu-link" id="menu-link">
                        <div class="link-box event-menu-item">
                            <img src="../../../images/registrants.png" alt="" id="item-icon">
                            <p>Reservations</p>
                        </div>
                    </a>

                    <div class="break"></div>

                    <a href="../../navigation/members.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item">
                            <img src="../../../images/member.png" alt="" id="item-icon">
                            <p>Members</p>
                        </div>
                    </a>

                    <a href="../../navigation/staffs.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item">
                            <img src="../../../images/staff.png" alt="" id="item-icon">
                            <p>Staffs</p>
                        </div>
                    </a>

                    <a href="../../navigation/pastors.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item" id = "active-item">
                            <img src="../../../images/pastor.png" alt="" id="item-icon">
                            <p>Pastors</p>
                        </div>
                    </a>

                    <div class="break"></div>

                    <a href="../../navigation/branches.php" class="menu-link" id="menu-link">
                        <div class="link-box branch-item">
                            <img src="../../../images/branch.png" alt="" id="item-icon">
                            <p>Branches</p>
                        </div>
                    </a>

                </div>

                <div class="bottom-items">
                    <!-- <p id = "username-area">Username ajsdfkhfkjasdhfkjagsfkgadshfggf</p>

                    <button id="input-toggle">
                        <img id = "action-icon" src="../../../images/dark_outline.png" alt="" onclick="darkMode()">
                    </button>

                    <a href="" class="logout-button">
                        <div class="logout-box">
                            <span class="out-context">logout</span>
                            <img src="../../../images/logout.png" alt="" id="action-icon">
                        </div>
                    </a> -->
                </div>

            </div>

            <div class="item-screen" id="item-screen">

                <div class="detail-box">

                    <div class="item-list">

                        <div class="form-box">

                            <h2 id="aff-head">Add pastor information</h2>

                            <form action = "../../../includes/actions/pastor_add.php" method="POST">
                                <div class="field-box">
                                    <p>First name</p>
                                    <input type="text" name="first_name" id="aff-field" required autofocus>
                                </div>
                                <div class="field-box">
                                    <p>Last name</p>
                                    <input type="text" name="last_name" id="aff-field" required>
                                </div>
                                <div class="field-box max-width">
                                    <p>Contact number (+63)</p>
                                    <input type="text" name="contact_number" id="aff-field">
                                </div>
                                <button type="submit" name="submit" value="submit" id="aff-bt">Add</button>
                                <a href="../../navigation/pastors.php" class="cancel-bt" id="aff-cancel">Cancel</a>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src = "../../../scripts/main.js"></script>

    </body>

</html>