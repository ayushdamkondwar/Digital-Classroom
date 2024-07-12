<?php
include('includes/connection.php');
include('includes/adminheader.php');

// session_start();

if ($_SESSION['role'] == 'admin') {
    // Display admin navigation and user tables based on roles
    include('includes/adminnav.php');
?>

<div id="page-wrapper">
    <div class="container " style="margin-left:220px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All Users</h1>

                <!-- Bootstrap Nav Pills for Role Selection -->
               <div class="text-center">
               <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#admin">Admins</a></li>
                    <li><a data-toggle="pill" href="#student">Students</a></li>
                    <li><a data-toggle="pill" href="#teacher">Teachers</a></li>
                </ul>
               </div>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Admins Tab -->
                    <div id="admin" class="tab-pane fade in active">
                        <h3>Admins</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users WHERE role = 'admin' ORDER BY name ASC";
                                $select_admins = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($select_admins)) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td><a href='viewprofile.php?name={$row['username']}' target='_blank'>{$row['username']}</a></td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['course']}</td>";
                                    echo "<td><a onclick=\"return confirm('Are you sure you want to delete this admin?')\" href='users.php?delete={$row['id']}'><i class='fa fa-times fa-lg'></i> Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Students Tab -->
                    <div id="student" class="tab-pane fade">
                        <h3>Students</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users WHERE role = 'student' ORDER BY name ASC";
                                $select_students = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($select_students)) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td><a href='viewprofile.php?name={$row['username']}' target='_blank'>{$row['username']}</a></td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['course']}</td>";
                                    echo "<td><a onclick=\"return confirm('Are you sure you want to delete this student?')\" href='users.php?delete={$row['id']}'><i class='fa fa-times fa-lg'></i> Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Teachers Tab -->
                    <div id="teacher" class="tab-pane fade">
                        <h3>Teachers</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users WHERE role = 'teacher' ORDER BY name ASC";
                                $select_teachers = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($select_teachers)) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td><a href='viewprofile.php?name={$row['username']}' target='_blank'>{$row['username']}</a></td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['course']}</td>";
                                    echo "<td><a onclick=\"return confirm('Are you sure you want to delete this teacher?')\" href='users.php?delete={$row['id']}'><i class='fa fa-times fa-lg'></i> Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
} else {
    // Redirect unauthorized users
    header("Location: index.php");
}
?>
