<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>E Clinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<?php
if (isset($_SESSION['adminid'])) {
?>

    <body>
        <!-- Admin Menu -->
        <div>
            <nav class="navbar navbar-expand-sm bg-info navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminaccount.php">Account</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="adminprofile.php">Admin Profile</a>
                            <a class="dropdown-item" href="adminchangepassword.php">Change Password</a>
                            <a class="dropdown-item" href="admin.php">Add Admin</a>
                            <a class="dropdown-item" href="viewadmin.php">View Admin</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Patient</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="addpatient.php">Add Patient</a>
                            <a class="dropdown-item" href="viewpatient.php">View Patient Records</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Doctor</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="doctor.php">Add Doctor</a>
                            <a class="dropdown-item" href="Viewdoctor.php">View Doctor</a>
                            <a class="dropdown-item" href="doctortimings.php">Add Doctor Timings</a>
                            <a class="dropdown-item" href="viewdoctortimings.php">View Doctor Timings</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Nurse</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="nurse.php">Add Nurse</a>
                            <a class="dropdown-item" href="Viewnurse.php">View Nurse</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Settings</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="department.php">Add Department</a>
                            <a class="dropdown-item" href="Viewdepartment.php">View Department</a>
                            <a class="dropdown-item" href="treatment.php">Add Treatment type</a>
                            <a class="dropdown-item" href="viewtreatment.php">View Treatment types</a>
                            <a class="dropdown-item" href="medicine.php">Add Medicine</a>
                            <a class="dropdown-item" href="Viewmedicine.php">View Medicine</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="viewdoctorconsultancycharge.php">Income Report</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
        </div>
    <?php
}
    ?>
    <?php
    if (isset($_SESSION['doctorid'])) {
    ?>

        <!-- Doctor Menu -->
        <div>
            <nav class="navbar navbar-expand-sm bg-info navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="doctoraccount.php">Account</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Settings</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="doctorprofile.php">Profile</a>
                            <a class="dropdown-item" href="doctorchangepassword.php">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Appointment</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="viewappointmentpending.php">View Pending Appointments</a>
                            <a class="dropdown-item" href="viewappointmentapproved.php">View Approved Appointments</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="viewpatient.php">Patient</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Timings</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="doctortimings.php">Add Timings</a>
                            <a class="dropdown-item" href="viewdoctortimings.php">View Timings</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Treatments</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="viewtreatment.php">View Treatment</a>
                            <a class="dropdown-item" href="viewtreatmentrecord.php">View Treatment Details</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
        </div>

    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['patientid'])) {
    ?>
        <!-- Patient Menu -->
        <div>
            <nav class="navbar navbar-expand-sm bg-info navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="patientaccount.php">Account</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Appointment</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="patientappointment.php">Add Appointments</a>
                            <a class="dropdown-item" href="viewappointment.php">View Appointments</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="patientprofile.php">View Profile</a>
                            <a class="dropdown-item" href="patientchangepassword.php">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="patviewprescription.php">View Prescription</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="viewtreatmentrecord.php">View Treatment</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['nurseid'])) {
    ?>
        <div>
            <nav class="navbar navbar-expand-sm bg-info navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="nurseaccount.php">Account</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="nurseprofile.php">Nurse Profile</a>
                            <a class="dropdown-item" href="nursechangepassword.php">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Patient</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="addpatient.php">Add Patient</a>
                            <a class="dropdown-item" href="viewpatient.php">View Patient Records</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Appointment</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="appointment.php">New Appointment</a>
                            <a class="dropdown-item" href="viewappointmentpending.php">View Pending Appointments</a>
                            <a class="dropdown-item" href="viewappointmentapproved.php">View Approved Appointments</a>

                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="viewtreatmentrecord.php">Treatment</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Doctor</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="Viewdoctor.php">View Doctor</a>
                            <a class="dropdown-item" href="viewdoctortimings.php">View Doctor Timings</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="###" id="navbardrop" data-toggle="dropdown">Settings</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="department.php">Add Department</a>
                            <a class="dropdown-item" href="Viewdepartment.php">View Department</a>
                            <a class="dropdown-item" href="treatment.php">Add Treatment type</a>
                            <a class="dropdown-item" href="viewtreatment.php">View Treatment types</a>
                            <a class="dropdown-item" href="medicine.php">Add Medicine</a>
                            <a class="dropdown-item" href="Viewmedicine.php">View Medicine</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
        </div>
    <?php
    }
    ?>

    </body>

</html>