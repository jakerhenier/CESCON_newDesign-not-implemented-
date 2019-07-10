<?php 
require_once('../../../includes/config/db.php');

$member_id = '';
$first_name = '';
$last_name = '';
$dob = '01-01-1970';
$sex = '';
$district = '';
$contact_number = '';
$email = '';
$church_name = '';
$church_address = '';
$district = '';

if (isset($_GET['edit'])) {
    $member_id = $_GET['edit'];

    $query = "SELECT * FROM member WHERE member_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $member_id = $row['member_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $dob = date('Y-m-d', strtotime($row['DOB']));
            $sex = $row['sex'];
            $contact_number = $row['contact_number'];
            $email = $row['email'];
            $allergies = $row['allergies'];
            $church_name = $row['church_name'];
            $church_address = $row['church_address'];
            $district = $row['church_district'];
        }
    }

    function filterDistrict($array) {
        global $district;

        if ($array != $district) {
            return true;
        }
        else {
            return false;
        }
    }

    function filterSex($array1) {
        global $sex;

        if ($array1 != $sex) {
            return true;
        }
        else {
            return false;
        }
    }

    $array = array(
        "Agusan District",
        "Bukidnon",
        "Cebu",
        "CENODA District",
        "COMVAL District",
        "Cotabato 1 (North)",
        "Cotabato 2",
        "Davao City",
        "Davao Del Sur",
        "Emmanuel District",
        "Maranatha District",
        "Monkayo District",
        "NEDA District",
        "Samal (IGACOS) District",
        "Sarangani District",
        "SOCSARGEN District",
        "Valenzuela City",
        "Zampen District",
        "Bohol",
    );

    $array1 = array(
        "Male",
        "Female"
    );

    $newArr = array_filter($array, "filterDistrict");
    $newArr1 = array_filter($array1, "filterSex");

    $pastor_query = "SELECT * FROM pastor";
    $result = $conn->query($pastor_query);  
}
?>

<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

<html>

    <head>
        <title>Edit a member</title>

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
                <p class="page-label">Edit a member</p>
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
                        <div class="link-box affiliate-item" id = "active-item">
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

                            <h2 id="aff-head">Edit member information</h2>

                            <form action="../../../includes/actions/member_edit.php" method="POST">
                                <div class="field-box">
                                    <p>First name</p>
                                    <input type="text" name = "first_name" value="<?php echo $first_name ?>" id="aff-field" required autofocus>
                                </div>
                                <div class="field-box">
                                    <p>Last name</p>
                                    <input type="text" name = "last_name" value="<?php echo $last_name ?>" id="aff-field" required>
                                </div>
                                <div class="field-box">
                                    <p>Date of birth</p>
                                    <input type="date" name="dob" value="<?php echo $dob ?>" id="aff-field" required>
                                </div>
                                <div class="field-box">
                                    <p>Sex</p>
                                    <select name="sex" id="aff-field">
                                        <option value="<?php echo $sex; ?>" selected disabled><?php echo $sex; ?></option>
                                        <?php 
                                        foreach ($newArr1 as $list) {
                                            echo '<option value="'.$list.'">'.$list.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="field-box">
                                    <p>Contact number (+63)</p>
                                    <input type="number" name = "contact_number" value="<?php echo $contact_number ?>" id="aff-field">
                                </div>
                                <div class="field-box">
                                    <p>Email</p>
                                    <input type="email" name="email" value="<?php echo $email ?>" id="aff-field">
                                </div>
                                <div class="field-box max-width allergy-sec">
                                    <p>Allergies (ignore if none)</p>
                                    <label for="chicken">
                                        <input type="checkbox" id="chicken">Chicken
                                        <span class="check"></span>
                                    </label>
                                    <label for="shrimp">
                                        <input type="checkbox" id="shrimp">Shrimp
                                        <span class="check"></span>
                                    </label>
                                    <label for="pork">
                                        <input type="checkbox" id="pork">Pork
                                        <span class="check"></span>
                                    </label>
                                    <label for="fish">
                                        <input type="checkbox" id="fish">Fish&nbsp;
                                        <span class="check"></span>
                                    </label>
                                </div>
                                <div class="field-box">
                                    <p>Church name</p>
                                    <input type="text" name="church_name" value="<?php echo $church_name ?>"  id="aff-field">
                                </div>
                                <div class="field-box">
                                    <p>Church address</p>
                                    <input type="text" name="church_address" value="<?php echo $church_address ?>" id="aff-field">
                                </div>
                                <div class="field-box">
                                    <p>Church district</p>
                                    <select name="church_district" id="aff-field" required>
                                        <option value="<?php echo $district ?>" selected><?php echo $district ?></option>
                                        <?php 
                                        foreach ($newArr as $list) {
                                            echo '<option value="'.$list.'">'.$list.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="field-box">
                                    <p>Pastor</p>
                                    <select name="pastor_id" id="aff-field" required>
                                        <option value="" selected disabled>Select Pastor</option>
                                        <?php 
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="'.$row['pastor_number'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" id="aff-bt" value="<?php echo $member_id ?>">Save</button>
                                <a href="" class="delete-bt">Delete</a>
                                <a href="../../navigation/members.php" class="cancel-bt" id="aff-cancel">Cancel</a>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src = "../../../scripts/main.js"></script>
        <script src="../../../scripts/jquery.js"></script>
        <script>
            $(document).ready(function () {
                var allergies = '';

                $('#chicken').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Chicken ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Chicken ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                $('#shrimp').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Shrimp ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Shrimp ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                $('#pork').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Pork ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Pork ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                $('#fish').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Fish ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Fish ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                if ($('#allergies').val() == '') {
                    $('#allergies').attr('value', 'None');
                }
            })
        </script>

    </body>

</html>