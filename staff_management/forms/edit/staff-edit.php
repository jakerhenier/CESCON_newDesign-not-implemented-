<?php 
session_start();
require_once('../../../includes/config/db.php');
require_once('../../../includes/function/crypt.php');

function getAccessLevel($access_level) {
    $keypair = array(
        "0" => "Normal User",
        "1" => "Administrator"
    );

    return $keypair[$access_level];
}

$staff_number = '';
$first_name = '';
$last_name = '';
$contact_number = '';
$username = '';
$password = '';
$access_level = '';

$staffData = array();

if (!isset($_SESSION['staff_session'])) {
    header('location: ../../index.php');
}
else {
    $staffData = $_SESSION['staff_session'];
}

if ($staffData[0]['access_level'] == 0) {
    header('location: ../../index.php');
}

if (isset($_GET['edit'])) {
    $staff_number = $_GET['edit'];

    $query = "SELECT * FROM staff WHERE staff_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staff_number);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $staff_number = $row['staff_number'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $contact_number = $row['contact_number'];
            $username = $row['username'];
            $password = $row['password'];         
            $access_level = $row['access_level'];   
        }
    }
}
?>

<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

<html>

    <head>
        <title>Edit a staff</title>

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
                <p class="page-label">Edit a staff</p>
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
                        <div class="link-box affiliate-item" id = "active-item">
                            <img src="../../../images/staff.png" alt="" id="item-icon">
                            <p>Staffs</p>
                        </div>
                    </a>

                    <a href="../../navigation/pastors.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item">
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

                            <h2 id="aff-head">Edit staff information</h2>

                            <form action = "../../../includes/actions/staff_edit.php" method="POST">
                                <div class="field-box">
                                    <p>First name</p>
                                    <input type = "text" name = "first_name" value="<?php echo $first_name ?>" id="aff-field" required>
                                </div>
                                <div class="field-box">
                                    <p>Last name</p>
                                    <input type = "text" name = "last_name" value="<?php echo $last_name ?>" id="aff-field" required>
                                </div>
                                <div class="field-box">
                                    <p>Contact number (+63)</p>
                                    <input type = "number" min=0 name = "contact_number" value="<?php echo $contact_number ?>" id="aff-field" required>
                                </div>
                                <!-- <div class="field-box">
                                    <p>Branch</p>
                                    <select name="" id="aff-field">
                                        <option value="" selected disabled>Select...</option>
                                        <option value="Agusan District">Agusan District</option>
                                        <option value="Bukidnon">Bukidnon</option>
                                        <option value="Cebu">Cebu</option>
                                        <option value="CENODA District">CENODA District</option>
                                        <option value="COMVAL District">COMVAL District</option>
                                        <option value="Cotabato 1 (North)">Cotabato 1 (North)</option>
                                        <option value="Cotabato 2">Cotabato 2</option>
                                        <option value="Davao City">Davao City</option>
                                        <option value="Davao Del Sur">Davao Del Sur</option>
                                        <option value="Emmanuel District">Emmanuel District</option>
                                        <option value="MANA District">MANA District</option>
                                        <option value="Maranatha District">Maranatha District</option>
                                        <option value="Monkayo District">Monkayo District</option>
                                        <option value="NEDA District">NEDA District</option>
                                        <option value="Samal (IGACOS) District">Samal (IGACOS) District</option>
                                        <option value="Sarangani District">Sarangani District</option>
                                        <option value="SOCSARGEN District">SOCSARGEN District</option>
                                        <option value="Valenzuela City">Valenzuela City</option>
                                        <option value="Zampen District">Zampen District</option>
                                        <option value="Bohol">Bohol</option>
                                    </select>
                                </div> -->
                                <div id="form-break"></div>
                                <div class="field-box">
                                    <p>Username</p>
                                    <input type = "text" name = "username" value="<?php echo $username ?>" id="aff-field" required>
                                </div>
                                <div class="field-box">
                                    <p>Password</p>
                                    <input type = "text" name = "password" value="<?php echo encrypt_decrypt($password, "decrypt"); ?>" id="aff-field" required>
                                </div>
                                <div class="field-box max-width">
                                    <p>Access level</p>
                                    <select name="access_level" required>
                                        <option value="<?php echo $access_level ?>" selected><?php echo getAccessLevel($access_level) ?></option>
                                    <?php 
                                    if ($access_level == 0) { 
                                    ?>
                                        <option value="1">Administrator</option>
                                    <?php } 
                                    else if ($access_level == 1) { ?>
                                        <option value="0">Normal User</option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <button type = "submit" name="submit" value="<?php echo $staff_number ?>" id="aff-bt">Save</button>
                                <a href="" class="delete-bt">Delete</a>
                                <a href="../../navigation/staffs.php" class="cancel-bt" id="aff-cancel">Cancel</a>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src = "../../../scripts/main.js"></script>

    </body>

</html>